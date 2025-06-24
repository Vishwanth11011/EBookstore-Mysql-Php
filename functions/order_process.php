<?php
    session_start();

    if (!empty($_POST)) 
    {
        extract($_POST);

        $_SESSION['error'] = array();

        if (empty($fullname)) 
        {
            $_SESSION['error'][] = "Enter full name";
        }

        if (empty($address)) 
        {
            $_SESSION['error'][] = "Enter full address";
        }

        if (empty($pincode)) 
        {
            $_SESSION['error'][] = "Enter city pincode";
        }

        if (empty($city)) 
        {
            $_SESSION['error'][] = "Enter city";
        }

        if (empty($state)) 
        {
            $_SESSION['error'][] = "Enter state";
        }

        if (empty($mobile_number)) 
        {
            $_SESSION['error'][] = "Enter mobile number";
        } 
        elseif (!is_numeric($mobile_number)) 
        {
            $_SESSION['error'][] = "Enter mobile number in digits";
        }

        if($_SESSION['client']['order_total_price'] <= 0)
        {
            $_SESSION['error'][] = "Cart is empty";
            header("location: ../book_list.php");
            exit();
        }

        if (!empty($_SESSION['error'])) 
        {
            // Redirect to 'order.php' with an error message
            header("location: ../order.php");
            exit();
        } 
        else 
        {
            include("../includes/connection.php");

            $register = $_SESSION['client']['id'];
            $total_price = $_SESSION['client']['order_total_price'];
            $book_name = $_SESSION['client']['order_books_name'];

            $query = "INSERT INTO `order_table`(`order_name`, `order_address`, `order_pincode`, `order_city`, `order_state`, `order_mobile`, `order_register_id`, `order_total_price`, `order_list_books`) VALUES ('$fullname', '$address', '$pincode', '$city', '$state', '$mobile_number', '$register', '$total_price', '$book_name')";
            mysqli_query($connection_database, $query);

            header("location: ../payment.php");
            exit();
        }
    } 
    else 
    {
        header("location: ../order.php");
        exit();
    }
?>
