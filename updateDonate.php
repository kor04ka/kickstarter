<?php 
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'kickstarter');

    $query_db = "SELECT * FROM projects WHERE id={$_GET['id']}";

    $query = mysqli_query($connect, $query_db);

    $row = mysqli_fetch_assoc($query);

    $row['donated'] = $row['donated'] + 10;

    $update = "UPDATE projects SET donated=" . $row['donated'] . " WHERE id={$_GET['id']}";

    $update_query = mysqli_query($connect, $update);

    header('Location: index.php');
?>