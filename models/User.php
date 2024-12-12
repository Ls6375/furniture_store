<?php
namespace Models;
use App\Database;

class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    // Check if email exists in the database
    public function isEmailExist($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Register a new user
    public function createUser($name, $username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();  // Return true if successful, false if failed
    }

    // Get user by email
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email and is_admin = 0  LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Return the first user or null if not found
        return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }

		public function getAdminUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email  and is_admin = 1 LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Return the first user or null if not found
        return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }
}


?>