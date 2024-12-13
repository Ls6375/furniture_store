<?php
namespace App\Middleware;

class UserAuthMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['user_id'])) {

            // User is not authenticated, redirect to login page
						setFlash('errors', ['login' => 'Please login first to continue']);
            header('Location: ' . route('signin'));
            exit;
        }
    }
}

?>