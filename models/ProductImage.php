<?php
namespace Models;

use App\Database;

class ProductImage
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    // Add image for a product
    public function addImage($productId, $image)
    {
        $sql = "INSERT INTO product_images (product_id, image_name) VALUES (:product_id, :image_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':image_name', $image);

        return $stmt->execute();
    }

    // Get all images for a product
    public function getImagesByProductId($productId)	
    {
        $sql = "SELECT * FROM product_images WHERE product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
