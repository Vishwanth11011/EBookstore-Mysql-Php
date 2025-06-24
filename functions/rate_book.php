<?php
session_start();
include("../includes/connection.php");

if (!isset($_SESSION['client']['id']) || $_SESSION['client']['status'] !== true) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = isset($_POST['book_id']) ? (int)$_POST['book_id'] : 0;
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
    $user_id = (int) $_SESSION['client']['id']; // ✅ Correct key

    if ($rating < 1 || $rating > 5 || $book_id <= 0) {
        header("Location: ../book_detail.php?id=" . $book_id);
        exit();
    }

    $check_query = "SELECT * FROM book_ratings WHERE book_id = ? AND user_id = ?";
    $stmt = mysqli_prepare($connection_database, $check_query);
    mysqli_stmt_bind_param($stmt, "ii", $book_id, $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $update_query = "UPDATE book_ratings SET rating = ?, created_at = NOW() WHERE book_id = ? AND user_id = ?";
        $stmt = mysqli_prepare($connection_database, $update_query);
        mysqli_stmt_bind_param($stmt, "iii", $rating, $book_id, $user_id);
    } else {
        $insert_query = "INSERT INTO book_ratings (book_id, user_id, rating) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection_database, $insert_query);
        mysqli_stmt_bind_param($stmt, "iii", $book_id, $user_id, $rating);
    }

    mysqli_stmt_execute($stmt);

    header("Location: ../book_detail.php?id=" . $book_id);
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
?>