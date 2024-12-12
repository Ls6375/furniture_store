<?php
// utils/flash_helpers.php

// Set a flash message in the session
function setFlash($key, $message) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Start session if not already started
    }
    $_SESSION[$key] = $message;
}

// Get and remove a flash message from the session
function getFlash($key) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Start session if not already started
    }
    if (!isset($_SESSION[$key])) return null;
    $message = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $message;
}

// Check if a flash message exists
function hasFlash($key) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Start session if not already started
    }
    return isset($_SESSION[$key]);
}
