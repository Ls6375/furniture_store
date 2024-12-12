<?php

namespace Models;

use App\Database;

class Product
{
	private $pdo;

	public function __construct()
	{
		$this->pdo = (new Database())->pdo;
	}

	// Create a new product
	public function createProduct($name, $category, $price, $stock, $slug, $mainImage)
	{
		$sql = "INSERT INTO products (name, category, price, stock, slug, mainImage) VALUES (:name, :category, :price, :stock, :slug, :mainImage)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':category', $category);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':stock', $stock);
		$stmt->bindParam(':slug', $slug);
		$stmt->bindParam(':mainImage', $mainImage);

		if ($stmt->execute()) {
			return $this->pdo->lastInsertId(); // Return the last inserted ID
		}

		return false; // Return false if insertion fails
	}


	// Get product by ID
	public function getProductById($id)
	{
		$sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	// In Product model
	public function getProductBySlug($slug)
	{
		$sql = "SELECT * FROM products WHERE slug = :slug LIMIT 1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':slug', $slug);
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}



	// Get all products
	public function getAllProducts()
	{
		$sql = "SELECT * FROM products";
		$stmt = $this->pdo->query($sql);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// Check if product already exists based on slug
	public function isProductExist($slug)
	{
		$sql = "SELECT * FROM products WHERE slug = :slug LIMIT 1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':slug', $slug);
		$stmt->execute();
		return $stmt->rowCount() > 0;
	}



	// Check if the product slug exists
	public function isSlugExist($slug)
	{
		$sql = "SELECT * FROM products WHERE slug = :slug LIMIT 1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':slug', $slug);
		$stmt->execute();
		return $stmt->rowCount() > 0;
	}

	function deleteProduct($id)
	{
		$sql = "DELETE FROM products WHERE id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
}