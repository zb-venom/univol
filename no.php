<?php
    session_start();
    require_once "db.php";
    $type = $_SESSION['type'];
    $id = $_GET['id'];
    if ($type != "admin")
        header('Location: index.php ');
    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    header('Location: orgs.php ');
?>