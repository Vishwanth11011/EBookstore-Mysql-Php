<?php
	// Database configuration
	define("DB_HOST", "localhost");
	define("DB_NAME", "bookstoredatabase");
	define("DB_USER", "root");
	define("DB_PASS", "");

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	// Create a new database connection
	$connection_database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($connection_database->connect_error) {
		error_log("Database connection failed: " . $connection_database->connect_error);

		header("Location: ../500.php");
		exit();
	}
?>