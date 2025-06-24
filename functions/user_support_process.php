<?php

    session_start();
    
    if (!empty($_POST)) 
    {
        extract($_POST);

        $_SESSION['error'] = array();


        if (empty($subject))
        {
            $_SESSION['error'][] = "Please enter subject";
        }

        if (empty($message))
        {
            $_SESSION['error'][] = "Please enter message";
        }

        if (!empty($_SESSION['error'])) 
        {
            header("location: ../user_support.php");
            exit();
        } 
        else 
        {
            include('../includes/connection.php');

            $user_id_support = (int)$_SESSION['client']['id'];

            $query = "INSERT INTO `user_support_table`(`user_support_actual_id`, `user_support_email`, `user_support_subject`, `user_support_message`) VALUES ('$user_id_support', '$useremail', '$subject', '$message')";
        
            mysqli_query($connection_database, $query);

            $_SESSION['message']['success'] = "Message sended to support group";
            header("location: ../index.php");
            exit();
        }
    }
    else 
    {
        header("location: ../user_support.php");
        exit();
    }
?>