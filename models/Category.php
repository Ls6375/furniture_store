<?php

namespace Models;

use App\Database;

class Category
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    // Get all categories
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Create a new category
    public function createCategory($name, $image = null)
    {
        $sql = "INSERT INTO categories (name, image) VALUES (:name, :image)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Update an existing category
    public function updateCategory($id, $name, $image = null)
    {
        $sql = "UPDATE categories SET name = :name, image = :image WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Delete a categoryc
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
