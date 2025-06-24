<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!empty($_POST)) {
    $_SESSION['error'] = array();

    extract($_POST);

    if (empty($category)) {
        $_SESSION['error']['category'] = "Category name cannot be empty";
        header("location: ../category_add.php");
        exit();
    } else {
        include("../../includes/connection.php");

        if (!$connection_database) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $category = mysqli_real_escape_string($connection_database, $category);

        $query = "INSERT INTO `category_table`(`category_name`) VALUES ('$category')";

        if (mysqli_query($connection_database, $query)) {
            header("location: ../category_view.php");
            exit();
        } else {
            die("Error inserting category: " . mysqli_error($connection_database));
        }
    }
} else {
    header("location: ../category_add.php");
    exit();
}