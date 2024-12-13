<?php
// Database.php
namespace App;

use PDO;
use PDOException;

class Database 
{
    private $host = 'localhost';
    private $dbname = 'furniture_store';
    private $username = 'root';
    private $password = 'Ajit@1997';
    public $pdo;

    public function __construct() 
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        try {
            // Set up the PDO connection with the database name included
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            // Set error reporting mode to exceptions
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Log the error message instead of displaying it directly
            error_log("Database connection error: " . $e->getMessage(), 3, 'errors.log');
            
            // Display a generic error message to the user
            die("An error occurred while connecting to the database. Please try again later.");
        }
    }
}