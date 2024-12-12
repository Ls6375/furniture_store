<?php
require_once ('../utils/helpers/auth_helper.php');
require_once ('../utils/helpers/flash_helpers.php');

function assets($path = '')  {
	global $assets;
	return  $assets . $path;
}

function route($path = '')  {
	global $baseUrl;
	return  $baseUrl . $path;
}
?>