<?php
    $query = "
        SELECT 
            b.*, 
            COALESCE(AVG(r.rating), 0) AS avg_rating,
            COUNT(r.rating) AS rating_count
        FROM `book_table` b
        LEFT JOIN `book_ratings` r ON b.book_id = r.book_id
        GROUP BY b.book_id
        ORDER BY b.book_id DESC
    ";

    $result = mysqli_query($connection_database, $query);
?>