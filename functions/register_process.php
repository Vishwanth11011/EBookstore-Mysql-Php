<?php
session_start();

if (!empty($_POST)) {
    extract($_POST);
    $_SESSION['error'] = array();
    $_SESSION['old'] = $_POST; // Store previous input

    if (empty($fullname)) $_SESSION['error'][] = "Please enter full name";
    if (empty($username)) $_SESSION['error'][] = "Please enter user name";
    if (empty($password) || empty($confirm_password)) {
        $_SESSION['error'][] = "Please enter password";
    } else if ($password != $confirm_password) {
        $_SESSION['error'][] = "Passwords do not match";
    } else if (strlen($password) < 8) {
        $_SESSION['error'][] = "Password must be at least 8 characters";
    }
    if (empty($email)) {
        $_SESSION['error'][] = "Please enter E-Mail address";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'][] = "Invalid email format";
    }
    if (empty($answer)) $_SESSION['error'][] = "Please enter security answer";
    if (empty($contact_number) || !is_numeric($contact_number)) {
        $_SESSION['error'][] = "Please enter a valid contact number";
    }

    if (!empty($_SESSION['error'])) {
        header("location: ../register.php");
        exit();
    } else {
        include("../includes/connection.php");

        $check_stmt = $connection_database->prepare("SELECT register_user_name FROM register_table WHERE register_user_name = ?");
        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $_SESSION['error'][] = "Username already exists. Please choose another one.";
            header("location: ../register.php");
            exit();
        }

        $time = time();

        $stmt = $connection_database->prepare("INSERT INTO `register_table` 
            (`register_full_name`, `register_user_name`, `register_password`, `register_contact_number`, `register_email`, `register_question`, `register_answer`, `register_time`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssssi", $fullname, $username, $password, $contact_number, $email, $question, $answer, $time);
        $stmt->execute();
        $user_id = $stmt->insert_id;
        $_SESSION['user'] = array(
            'id' => $user_id,
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email
        );

        unset($_SESSION['old']); 
        $_SESSION['message'] = array();
        $_SESSION['message']['success'] = "You are signed up and logged in successfully";

        header("location: ../index.php");
        exit();
    }
} else {
    header("location: ../register.php");
    exit();
}