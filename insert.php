<?php 
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'lesson35');

    $query_db = 'INSERT INTO basket (`id`, `name`, `image`, `price`
               VALUES ("' . $_GET["id"] . '", "' . $_GET["name"] . '", "' . $_GET["image"] . '", "' . $_GET["price"] . '")';

    mysqli_query($connect, $query_db);
    
    header('location: acc.php');
?>