<?php

namespace Controllers;

use Models\User;

class AuthController extends BaseController
{
	private $userModel;

	public function __construct()
	{
		parent::__construct();
		$this->userModel = new User();  // Get the User model instance
	}

	// Show the sign-up page
	public function showSignup()
	{
		$this->render('../views/signup.php');
	}

	// Show the sign-in page
	public function showSignIn()
	{
		$this->render('../views/signin.php');
	}

	// Handle the sign-up logic
	public function signup()
	{
		$errors = [];
		$name = $username = $email = $password = $repeatPassword = '';

		// Handle form submission
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Retrieve user inputs
			$name = trim($_POST['name']);
			$username = trim($_POST['username']);
			$email = trim($_POST['email']);
			$password = $_POST['password'];
			$repeatPassword = $_POST['repeatPassword'];

			// Validate the form data
			if (empty($name)) {
				$errors['name'] = 'Name is required.';
			}

			if (empty($username)) {
				$errors['username'] = 'Username is required.';
			}

			if (empty($email)) {
				$errors['email'] = 'Email is required.';
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'Invalid email format.';
			} elseif ($this->userModel->isEmailExist($email)) {
				$errors['email'] = 'Email is already registered.';
			}

			if (empty($password)) {
				$errors['password'] = 'Password is required.';
			}

			if ($password !== $repeatPassword) {
				$errors['repeatPassword'] = 'Passwords do not match.';
			}

			// If no errors, create the user
			if (empty($errors)) {
				if ($this->userModel->createUser($name, $username, $email, $password)) {
					// Redirect to login page after successful registration
					setFlash('success', 'Registration successful! You can now log in.');
					header('Location: signin');
					exit;
				} else {
					$errors['general'] = 'Registration failed, please try again later.';
				}
			}

			// Store errors in flash
			setFlash('errors', $errors);
			// Pass errors to the view
			header('Location: signup');
			exit;
		}
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
				$user = $this->userModel->getUserByEmail($email);

				if ($user && password_verify($password, $user['password'])) {
					// Set session for the user (assuming session is started)
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['user_email'] = $user['email'];

					// Redirect to homepage after successful login
					setFlash('success', 'Login successful!');
					header('Location: ./');  // or another page
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
		header('Location: signin');
		exit;
	}
}
