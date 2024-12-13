<?php

namespace Models;

use App\Database;
use PDO;

class Order
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    // Method to create a new order
    public function createOrder($userId, $firstName, $email, $phone, $address, $city, $state, $zipCode, $cardName, $cardNumber, $expiration, $cvv)
    {
        $sql = "INSERT INTO orders (user_id, firstName, email, phone, address, city, state, zipCode, cardName, cardNumber, expiration, cvv) 
                VALUES (:user_id, :firstName, :email, :phone, :address, :city, :state, :zipCode, :cardName, :cardNumber, :expiration, :cvv)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':firstName' => $firstName,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':zipCode' => $zipCode,
            ':cardName' => $cardName,
            ':cardNumber' => $cardNumber,
            ':expiration' => $expiration,
            ':cvv' => $cvv
        ]);

        return $this->pdo->lastInsertId();
    }

    // Method to add items to the cart
    public function addToCart($orderId, $productId, $quantity)
    {
        $sql = "INSERT INTO cart (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':order_id' => $orderId,
            ':product_id' => $productId,
            ':quantity' => $quantity
        ]);
    }

    // Method to update the order status
    public function updateOrderStatus($orderId, $status)
    {
        $sql = "UPDATE orders SET order_status = :status WHERE order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':status' => $status,
            ':order_id' => $orderId
        ]);
    }

    // Method to get order details
    public function getOrderDetails($orderId)
    {
        $sql = "SELECT * FROM orders WHERE order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':order_id' => $orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to get cart items for an order
    public function getCartItems($orderId)
    {
        $sql = "SELECT * FROM cart WHERE order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':order_id' => $orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
