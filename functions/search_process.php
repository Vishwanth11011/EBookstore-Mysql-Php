<?php
    $search = $_GET['search'];

    $book_list_query = "SELECT * FROM `book_table` WHERE `book_name` LIKE '%$search%' OR `book_description` LIKE '%$search%'";

    $book_list_result = mysqli_query($connection_database, $book_list_query);
?>