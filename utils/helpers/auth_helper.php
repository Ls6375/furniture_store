<?php
// utils/flash_helpers.php

function isLoggedIn()
{
	return isset($_SESSION['user_id']);
}

// Get the logged-in user's username
function getUsername()
{
	return isLoggedIn() ? $_SESSION['user_email'] : null;
}
