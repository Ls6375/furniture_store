<?php
session_start(); // Start the session to track user login status

// Global variables
$baseUrl = '/php/Group_project/';
$assets = $baseUrl . 'public/assets/';

require_once __DIR__ . '/../utils/helpers.php';
require_once __DIR__ . '/autoload.php';

use App\Middleware\AdminAuthMiddleware;
use App\Middleware\UserAuthMiddleware;
use App\Router;
use App\Utils\Auth;
use Controllers\AdminAuthController;
use Controllers\AdminCategoryController;
use Controllers\AdminProductController;
use Controllers\AuthController;
use Controllers\CartController;
use Controllers\ShopController;

// Create the router instance
$router = new Router();

$router->get('404', function() {
	require_once '../views/404.php';
});

$router->get('index', [ShopController::class, 'showHome']);
$router->get('shop', [ShopController::class, 'showShop']);
$router->get('cart', [ShopController::class, 'showCart']);
$router->get('product_detail/{product_slug}', [ShopController::class, 'showProductDetail']);
$router->get('checkout', [ShopController::class, 'checkout'], [UserAuthMiddleware::class]);
$router->post('checkout', [ShopController::class, 'completeOrder'], [UserAuthMiddleware::class]);
$router->get('orders', [ShopController::class, 'showOrders'], [UserAuthMiddleware::class]);

$router->post('cart/add', [CartController::class, 'addToCart']);
$router->post('cart/update', [CartController::class, 'updateCart']);
$router->post('cart/remove', [CartController::class, 'removeFromCart']);
$router->get('cart/items', [CartController::class, 'getCart']);
$router->get('cart/total', [CartController::class, 'getCartTotal']); // Add this line

// Authentication routes
$router->get('signup', [AuthController::class, 'showSignup']);
$router->post('signup', [AuthController::class, 'signup']);

$router->get('signin', [AuthController::class, 'showSignIn']);
$router->post('signin', [AuthController::class, 'signin']);
$router->get('logout', [AuthController::class, 'logout']);


// *************************************
// Admin Routes
// *************************************

$router->get('admin/signin', [AdminAuthController::class, 'showSignIn']);
$router->post('admin/signin', [AdminAuthController::class, 'signin']);
$router->get('admin/logout', [AdminAuthController::class, 'logout']);

// Protected Routes ( Only Authorized users allowed )
$router->get('admin', [AdminProductController::class, 'showHome'], [AdminAuthMiddleware::class]);
$router->post('admin', [AdminProductController::class, 'addProduct'], [AdminAuthMiddleware::class]);
$router->post('admin/product-delete', [AdminProductController::class, 'deleteProduct'], [AdminAuthMiddleware::class]);


$router->get('admin/categories', [AdminCategoryController::class, 'showCategories'], [AdminAuthMiddleware::class]);
$router->post('admin/categories', [AdminCategoryController::class, 'addCategory'], [AdminAuthMiddleware::class]);
$router->post('admin/category-edit', [AdminCategoryController::class, 'editCategory'], [AdminAuthMiddleware::class]);
$router->post('admin/category-delete', [AdminCategoryController::class, 'deleteCategory'], [AdminAuthMiddleware::class]);


// Resolve the route based on the current path and method
$router->resolve();
