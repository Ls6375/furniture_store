<?php
// public/autoload.php

spl_autoload_register(function ($class) {
	// Project root directory
	$baseDir = __DIR__ . '/../'; 

	// Convert namespace separator to directory separator
	$classPath = str_replace('\\', '/', $class); 

	// Full file path
	$filePath = $baseDir . $classPath . '.php';

	// Check if the file exists and require it
	if (file_exists($filePath)) {
		require_once $filePath;
	} else {
		error_log("Autoloader: Failed to load $filePath");
		die('Autoloader: Failed to load');
	}
});
?>
