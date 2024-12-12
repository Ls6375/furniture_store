<?php
// In ShopController
namespace Controllers;

use Models\Category;
use Models\Product;

class ShopController extends BaseController
{
    private $productModel;
		private $productCategories;

		
    public function __construct()
    {
        parent::__construct();
        $this->productModel = new Product();  // Initialize the Product model
				$this->productCategories = new Category();

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
        $this->render('../views/shop.php', [
					'categories' => $this->productCategories->getAllCategories(),
          'products' => $this->productModel->getAllProducts(),
				]);
    }

    // Show the Cart page
    public function showCart()
    {
        $this->render('../views/cart.php');
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
						header('Location: '. route('404'));
        }
    }
}

?>