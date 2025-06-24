<?php

session_start(); 

include("./includes/connection.php");

$book_id = $_GET['id'];
$book_query = "SELECT * FROM `book_table` WHERE `book_id` = $book_id";
$book_result = mysqli_query($connection_database, $book_query);
$book_row = mysqli_fetch_assoc($book_result);

$avg_rating_query = "SELECT AVG(rating) AS avg_rating FROM book_ratings WHERE book_id = $book_id";
$avg_rating_result = mysqli_query($connection_database, $avg_rating_query);
$avg_rating = mysqli_fetch_assoc($avg_rating_result)['avg_rating'] ?? 0;

$all_ratings_query = "SELECT rating FROM book_ratings WHERE book_id = $book_id";
$all_ratings_result = mysqli_query($connection_database, $all_ratings_query);

$user_id = $_SESSION['client']['register_id'] ?? null;
$user_rating = null;

if ($user_id) {
    $user_rating_query = "SELECT rating FROM book_ratings WHERE book_id = $book_id AND user_id = $user_id";
    $result = mysqli_query($connection_database, $user_rating_query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_rating = mysqli_fetch_assoc($result)['rating'];
    }
}

function show_details($input) {
    $cart = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $value) {
            if ($value['img'] == $input['book_img']) {
                $cart = 1;
                break;
            }
        }
    }
    if (isset($_SESSION['client']['status'])) {
        if ($cart == 0) {
            echo '<a href="functions/add_to_cart.php?book_card_id=' . $input['book_id'] . '" class="btn btn-outline-success mb-3">Add to Cart</a>';
        } else {
            echo "<a class='btn btn-outline-info mb-3' href='../cart.php'>Already in Cart</a>";
        }
    } else {
        echo '<a type="button" href="login.php" class="btn btn-outline-success me-2">Click here to Login..</a>';
    }
}

?>