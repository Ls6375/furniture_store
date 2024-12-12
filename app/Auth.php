<?php

namespace App;
class Auth
{
    // Check if the user is logged in
    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    // Get the logged-in user's username
    public static function getUsername()
    {
        return self::isLoggedIn() ? $_SESSION['user_email'] : null;
    }

    // Get the logged-in user's ID
    public static function getUserId()
    {
        return self::isLoggedIn() ? $_SESSION['user_id'] : null;
    }

}
