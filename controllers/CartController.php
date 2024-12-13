<?php

namespace Controllers;

use Models\Product;

class CartController

{
	private $productModel;

	public function __construct()
	{
		$this->productModel = new Product();
	}

	public function addToCart()
	{
		// Get product_id and quantity from POST request
		$productId = $_POST['product_id'] ?? null;
		$quantity = $_POST['quantity'] ?? 1;

		if (!$productId) {
			// Set flash error message and redirect back
			setFlash('errors', ['error' => 'Invalid Product ID.']);
			header('Location: ' . route('shop'));
			exit;
		}

		// Load product data from the database
		$product = $this->productModel->getProductById($productId);

		if (!$product) {
			// Set flash error message and redirect back
			setFlash('errors',   ['error' => 'Product not found.']);
			header('Location: ' . route('shop'));
			exit;
		}

		// Add item to the cart session
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = [];
		}

		// If the product is already in the cart, increase the quantity
		if (isset($_SESSION['cart'][$productId])) {
			$_SESSION['cart'][$productId]['quantity'] += $quantity;
		} else {
			$_SESSION['cart'][$productId] = [
				'name' => $product['name'],
				'price' => $product['price'],
				'quantity' => $quantity
			];
		}

		// Set flash success message and redirect back
		setFlash('success', 'Item added to cart successfully!');
		header('Location: ' . route('cart'));
		exit;
	}



	public function updateCart()
	{
		// Get data from POST request
		$data = json_decode(file_get_contents("php://input"), true);
		$productId = $data['productId'];
		$quantity = $data['quantity'];

		if (isset($_SESSION['cart'][$productId])) {
			$_SESSION['cart'][$productId]['quantity'] = $quantity;
			echo json_encode(['message' => 'Cart updated']);
		} else {
			echo json_encode(['message' => 'Item not found in cart']);
		}
	}

	public function removeFromCart()
	{
		// Get data from POST request
		$data = json_decode(file_get_contents("php://input"), true);
		$productId = $data['productId'];

		if (isset($_SESSION['cart'][$productId])) {
			unset($_SESSION['cart'][$productId]);
			echo json_encode(['message' => 'Item removed']);
		} else {
			echo json_encode(['message' => 'Item not found in cart']);
		}
	}

	public function getCart()
	{
		echo json_encode($_SESSION['cart']);
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

		// Return the total price as a JSON response
		echo json_encode(['total' => $totalPrice]);
	}
}
