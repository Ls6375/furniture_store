<?php

namespace Controllers;

use Models\Category;
use Models\Product;
use Models\ProductImage;

class AdminProductController extends BaseController
{
	private $productModel;
	private $productImageModel;
	private $productCategories;

	public function __construct()
	{
		parent::__construct();
		$this->productModel = new Product();
		$this->productImageModel = new ProductImage();
		$this->productCategories = new Category();
	}

	// Show the home page
	public function showHome()
	{
		$this->render('../views/admin/home.php', [
			'categories' => $this->productCategories->getAllCategories(),
			'products' => $this->productModel->getAllProducts(),
		]);
	}

	public function deleteProduct(){
		if (	$this->productModel->deleteProduct($_POST['id'])) {
			setFlash('success', 'Product deleted');
			header('Location: ' . route('admin'));
		}
	}

	// Handle Add Product Logic
	public function addProduct()
	{
		$errors = [];
		$productName = $category = $price = $stock = $slug = $mainImage = '';
		$images = [];

		// Handle form submission
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$productName = trim($_POST['productName'] ?? '') ;
			$category = trim($_POST['category'] ?? '') ;
			$price = $_POST['price'] ?? ''?? '';
			$stock = $_POST['stock'] ?? '';
			$slug = $_POST['slug'] ?? '';  //  slug 
			$mainImage = $_POST['mainImage'] ?? '';  // main image from dropdown

			// Validate form data
			if (empty($productName)) {
				$errors['productName'] = 'Product Name is required.';
			}

			if (empty($price) || !is_numeric($price)) {
				$errors['price'] = 'Price is required and must be a valid number.';
			}

			if (empty($mainImage) ) {
				$errors['mainImage'] = 'Main Image is required.';
			}

			if (empty($stock) || !is_numeric($stock)) {
				$errors['stock'] = 'Stock must be a valid number.';
			}


			// Check if product already exists
			if ($this->productModel->isProductExist($slug)) {
				$errors['slug'] = 'A product with this slug already exists.';
			}

			// Handle Image Upload Logic (Assumed dropzone behavior)
			if (!empty($_FILES['images'])) {
				$uploadedImages = $this->handleImageUpload($_FILES['images']);
				if (empty($uploadedImages)) {
					$errors['images'] = 'Failed to upload images.';
				} else {
					$images = $uploadedImages;
				}
			} else {
				$errors['images'] = 'At least one image is required.';
			}

			// If validation passes, create the product
			if (empty($errors)) {
				$productId = $this->productModel->createProduct($productName, $category, $price, $stock, $slug, $mainImage);
				if ($productId) {
					// Insert product images
					foreach ($images as $image) {
						$this->productImageModel->addImage($productId, $image);
					}

					// Redirect to the product listing page
					setFlash('success', 'Product added successfully!');
					header('Location: ' . route('admin/'));
					exit;
				} else {
					$errors['general'] = 'There was an error adding the product.';
				}
			}

			// Pass errors to the view
			setFlash('errors', $errors);
			$this->render('../views/admin/home.php', [
					'categories' => $this->productCategories->getAllCategories(),
					'products' => $this->productModel->getAllProducts(),
			]);
		}
	}

	// Handle image upload logic
	private function handleImageUpload($fileArray)
	{
			$uploadedImages = [];
			$targetDir = './assets/uploads/';
	
			foreach ($fileArray['tmp_name'] as $index => $tmpName) {
					$fileName = $fileArray['name'][$index];
					$targetFile = $targetDir . basename($fileName);
					if (move_uploaded_file($tmpName, $targetFile)) {
							$uploadedImages[] = basename($fileName);
					} else {
					}
			}
			return $uploadedImages;
	}
	
	
}
