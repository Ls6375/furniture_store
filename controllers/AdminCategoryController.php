<?php

namespace Controllers;

use Models\Category;
use Models\Product;
use Models\ProductImage;

class AdminCategoryController extends BaseController
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

	// Show the categories page
	public function showCategories()
	{
		$this->render('../views/admin/categories.php', [
			'categories' => $this->productCategories->getAllCategories(),
		]);
	}

	// Add a new category
	public function addCategory()
	{
		$errors = [];
		$categoryName = trim($_POST['name']);
		$image = $_FILES['image']['name'] ?? null;

		// Check if category name is empty
		if (empty($categoryName)) {
			$errors['categoryName'] = 'Category name is required.';
		}

		// Check if image is uploaded
		if (empty($image)) {
			$errors['categoryImage'] = 'Category image is required.';
		} else {
			// Validate the image (for example, check for file type, size, etc.)
			$targetDir = './assets/uploads/';
			$targetFile = $targetDir . basename($image);
			if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
				$errors['categoryImage'] = 'Failed to upload the image.';
			}
		}

		// If no errors, proceed with category creation
		if (empty($errors)) {
			$this->productCategories->createCategory($categoryName, $image);
			setFlash('success', 'Category added successfully!');
			header('Location: ' . route('admin/categories'));
			exit;
		} else {
			// Set the errors as a flash message to be handled by the controller
			setFlash('errors', $errors);
		}

		// Redirect to the form to display success or errors
		$this->render('../views/admin/categories.php', [
			'categories' => $this->productCategories->getAllCategories(),
		]);
		exit;
	}



	// Edit an existing category
	public function editCategory()
	{
		$categoryId = $_POST['id'];
		$categoryName = trim($_POST['name']);
		$image = $_FILES['image']['name'] ?? null;

		if (!empty($categoryId) && !empty($categoryName)) {
			if (!empty($image)) {
				$targetDir = './assets/uploads/';
				$targetFile = $targetDir . basename($image);
				move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
			}
			$this->productCategories->updateCategory($categoryId, $categoryName, $image);
			setFlash('success', 'Category updated successfully!');
		} else {
			setFlash('error', 'Both category ID and name are required.');
		}

		header('Location: ' . route('admin/categories'));
		exit;
	}

	// Delete a category
	public function deleteCategory()
	{
		$categoryId = $_POST['id'];

		if (!empty($categoryId)) {
			try {
				$this->productCategories->deleteCategory($categoryId);
				setFlash('success', 'Category deleted successfully!');
			} catch (\PDOException $e) {
				if ($e->getCode() == 23000) { // SQLSTATE[23000]: Integrity constraint violation
					setFlash('errors', ['general' => 'Cannot delete this category because it is referenced by existing products.']);
				} else {
					setFlash('errors', ['general' => 'An error occurred while trying to delete the category.']);
				}
			}
		} else {
			setFlash('errors', 'Category ID is required.');
		}

		header('Location: ' . route('admin/categories'));
		exit;
	}
}
