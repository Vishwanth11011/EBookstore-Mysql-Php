<?php
    session_start();

    include("../includes/connection.php");

    if (isset($_GET['book_card_id'])) 
    {

        $book_id = (int)$_GET['book_card_id'];

        $query = "SELECT * FROM `book_table` WHERE `book_id` = $book_id";

        $result = mysqli_query($connection_database, $query);

        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['cart'][] = array( "name" => $row['book_name'], "img" => $row['book_img'], "price" => $row['book_price'], "quantity" => 1);
        }
    } 
    elseif (!empty($_POST)) 
    {
        foreach ($_POST as $id => $quantity) 
        {
            if (isset($_SESSION['cart'][$id])) 
            {
                $_SESSION['cart'][$id]['quantity'] = $quantity;
            }
        }
    } 
    elseif (isset($_GET['id'])) 
    {
        $id = $_GET['id'];

        if (isset($_SESSION['cart'][$id])) 
        {
            unset($_SESSION['cart'][$id]);
        }
    }


    header("location: ../cart.php");
    exit();
?>
