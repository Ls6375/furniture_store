<?php
// In ShopController
namespace Controllers;

use Models\Category;
use Models\Order;
use Models\Product;
use Models\User;

class ShopController extends BaseController
{
	private $productModel;
	private $productCategories;
	private $productUser;
	private $userOrder;


	public function __construct()
	{
		parent::__construct();
		$this->productModel = new Product();  // Initialize the Product model
		$this->productCategories = new Category();
		$this->productUser = new User();
		$this->userOrder = new Order();
	}

	// Show the Home page
	public function showHome()
	{
		$this->render('../views/home.php',  [
			'categories' => $this->productCategories->getAllCategories(),
		]);
	}

	// Show the Shop page
	public function showShop()
	{
		// Get categories and products
		$categories = $this->productCategories->getAllCategories();
		$products = $this->productModel->getAllProducts();

		// Pass them to the view
		$this->render('../views/shop.php', [
			'categories' => $categories,
			'products' => $products,
		]);
	}


	public function showOrders()
{
    // Get categories and products
    $categories = $this->productCategories->getAllCategories();
    $products = $this->productModel->getAllProducts();

    // Fetch the orders
    $orders = $this->userOrder->getAllOrders(); // This will now work

    // Pass the data to the view
    $this->render('../views/orders.php', [
        'categories' => $categories,
        'products' => $products,
        'orders' => $orders,  // Add the orders here
    ]);
}



public function getAllOrders()
{
    // SQL to fetch orders and join with order_items (assuming there is an order_items table)
    $query = "SELECT o.*, oi.*, p.name AS product_name FROM orders o
              LEFT JOIN order_items oi ON o.order_id = oi.order_id
              LEFT JOIN products p ON oi.product_id = p.id";
    
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organize orders and their items
    $result = [];
    foreach ($orders as $order) {
        $orderId = $order['order_id'];
        if (!isset($result[$orderId])) {
            $result[$orderId] = $order;
            $result[$orderId]['items'] = [];
			$result[$orderId]['total'] = 0;
        }
        // Add items to the order
        $result[$orderId]['items'][] = [
            'product_name' => $order['product_name'],
            'quantity' => $order['quantity'],
            'price' => $order['price'],
        ];
		// Calculate the total for the order
        $result[$orderId]['total'] += $order['quantity'] * $order['price'];
    }

    return array_values($result); // Return the array of orders with items
}





	// Show the Cart page
	public function showCart()
	{
		$cartItems = $_SESSION['cart'] ?? [];

		if (!empty($cartItems)) {
			$cartData = [];

			foreach ($cartItems as $productId => $cartItem) {
				// Ensure $cartItem is an array before accessing its elements
                if (is_array($cartItem) && isset($cartItem['quantity'])) {
                    // Fetch product details by ID
                    $productData = $this->productModel->getProductById($productId);
    
                    if ($productData) {
                        // Merge product data with cart item data (like quantity)
                        $cartData[] = [
                            'id' => $productData['id'],
                            'name' => $productData['name'],
                            'price' => $productData['price'],
                            'quantity' => $cartItem['quantity'],
                            'totalPrice' => $productData['price'] * $cartItem['quantity'],
                            'mainImage' => $productData['mainImage'] ?? 'default.jpg' // Fallback to default image
                        ];
                    }
                } else {
                    // Handle the case where $cartItem is not an array
                    // You might want to log this or set an error message
                    error_log("Cart item for product ID $productId is not an array: " . print_r($cartItem, true));
                }
			}
		} else {
			$cartData = []; // No items in the cart
		}

		$this->render('../views/cart.php', ['cartItems' => $cartData]);
	}



	// Show the Product Detail page (Updated Method)
	public function showProductDetail($product_slug)
	{
		// Load the product data using the slug from the Product model
		$product = $this->productModel->getProductBySlug($product_slug);

		if ($product) {
			// Pass the product data to the view
			$this->render('../views/product_detail.php', ['product' => $product]);
		} else {
			echo "Product not found.";
			header('Location: ' . route('404'));
		}
	}

	public function checkout()
	{
		
			$this->render('../views/checkout.php', [
			'user' => $this->productUser->getUserByEmail($_SESSION['user_email']),
			'totalPrice' => $this->getCartTotal()
		

		]);
	}
	public function completeOrder()
	{
			$errors = [];
			$success = false;
	
			// Retrieve POST data
			$firstName = trim($_POST['firstName'] ?? '');
			$email = trim($_POST['email'] ?? '');
			$phone = trim($_POST['phone'] ?? '');
			$address = trim($_POST['address'] ?? '');
			$city = trim($_POST['city'] ?? '');
			$state = trim($_POST['state'] ?? '');
			$zipCode = trim($_POST['zipCode'] ?? '');
			$cardName = trim($_POST['cardName'] ?? '');
			$cardNumber = trim($_POST['cardNumber'] ?? '');
			$expiration = trim($_POST['expiration'] ?? '');
			$cvv = trim($_POST['cvv'] ?? '');
	
			// Validate required fields
			if (empty($firstName)) {
					$errors['firstName'] = 'First name is required.';
			}
			if (empty($email)) {
					$errors['email'] = 'Email is required.';
			}
			if (empty($phone)) {
					$errors['phone'] = 'Phone number is required.';
			}
			if (empty($address)) {
					$errors['address'] = 'Address is required.';
			}
			if (empty($city)) {
					$errors['city'] = 'City is required.';
			}
			if (empty($state)) {
					$errors['state'] = 'State is required.';
			}
			if (empty($zipCode)) {
					$errors['zipCode'] = 'Zip code is required.';
			}
	
			// Validate card information
			if (empty($cardName)) {
					$errors['cardName'] = 'Cardholder name is required.';
			}
			if (strlen($cardNumber) !== 16 || !ctype_digit($cardNumber)) {
					$errors['cardNumber'] = 'Card number must be 16 digits.';
			}
			if (!preg_match('/^\d{2}\/\d{2}$/', $expiration)) {
					$errors['expiration'] = 'Expiration date must be in MM/YY format.';
			}
			if (strlen($cvv) !== 3 || !ctype_digit($cvv)) {
					$errors['cvv'] = 'CVV must be 3 digits.';
			}
	
			// If no errors, proceed with order processing
			if (empty($errors)) {
					// Create a new order
					$orderId = $this->userOrder->createOrder(getUserId(), $firstName, $email, $phone, $address, $city, $state, $zipCode, $cardName, $cardNumber, $expiration, $cvv);
	
					// Retrieve cart data from session
					$cart = $_SESSION['cart'] ?? [];
	
					// Add items to the cart
					foreach ($cart as $item) {
						if (isset($item['product_id'], $item['quantity'])) {
							$this->userOrder->addToCart($orderId, $item['product_id'], $item['quantity']);
						} else {
							error_log("Cart item is missing 'product_id' or 'quantity': " . print_r($item, true));
						}
					}
					
	
					// Update order status to 'processing'
					$this->userOrder->updateOrderStatus($orderId, 'processing');
	
					// Optionally, clear the cart after successful order
					unset($_SESSION['cart']);
	
					// Set success message
					$success = 'Your order has been successfully placed!';
	
					// Redirect or render success page
					setFlash('success', $success);
					header('Location: ' . route('orders'));
					exit;
			}
	
			// If there are errors, return to the checkout page with error messages
			setFlash('errors', $errors);
			setFlash('old', $_POST); // Set Form Old Data.
			header('Location: ' . route('checkout'));
			exit;
	}
	
	public function getCartTotal()
	{
		// Check if the cart session exists
		if (!isset($_SESSION['cart'])) {
			echo json_encode(['total' => 0]);
			return;
		}

		// Initialize total price
		$totalPrice = 0;

		// Loop through each product in the cart
		foreach ($_SESSION['cart'] as $product) {
			// Calculate total for each product and add to totalPrice
			$totalPrice += $product['price'] * $product['quantity'];
		}

		return $totalPrice;
	}
}
