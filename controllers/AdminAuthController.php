<?php

namespace Controllers;

use Models\User;

class AdminAuthController extends BaseController
{
	private $userModel;

	public function __construct()
	{
		parent::__construct();
		$this->userModel = new User();  // Get the User model instance
	}

	// Show the sign-in page
	public function showSignIn()
	{
		$this->render('../views/admin/signin.php');
	}

	// Handle the sign-in logic
	public function signin()
	{
		$errors = [];
		$email = $password = '';

		// Handle form submission
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Retrieve user inputs
			$email = trim($_POST['email']);
			$password = $_POST['password'];

			// Validate the form data
			if (empty($email)) {
				$errors['email'] = 'Email is required.';
			}

			if (empty($password)) {
				$errors['password'] = 'Password is required.';
			}

			// If no errors, check credentials
			if (empty($errors)) {
				$user = $this->userModel->getAdminUserByEmail($email);

				if ($user && password_verify($password, $user['password'])) {
					// Set session for the user (assuming session is started)
					$_SESSION['admin_id'] = $user['id'];
					$_SESSION['admin_email'] = $user['email'];

					// Redirect to homepage after successful login
					setFlash('success', 'Login successful!');
					header('Location: ./');  
					exit;
				} else {
					$errors['login'] = 'Invalid email or password.';
				}
			}

			// Store errors in flash
			setFlash('errors', $errors);
			// Pass errors to the view
			header('Location: signin');
			exit;
		}
	}

	// Handle logout
	public function logout()
	{
		// Destroy session variables to log out
		session_unset();
		session_destroy();

		// Redirect to login page or home
		setFlash('success', 'You have logged out successfully.');
		header('Location: ' . route('admin/signin'));
		exit;
	}
}
