<?php
namespace App\Middleware;

class AdminAuthMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['admin_id'])) {

            // User is not authenticated, redirect to login page
						setFlash('errors', ['login' => 'Please login first to continue']);
            header('Location: ' . route('admin/signin'));
            exit;
        }
    }
}

?>