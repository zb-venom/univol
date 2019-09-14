<?php
    session_start();
    require_once "db.php";
    $type = $_SESSION['type'];
    $id = $_GET['id'];
    $id_event = $_GET['id_event'];
    if ($type != "admin")
        header('Location: index.php ');
    $sql = "DELETE FROM volunteers WHERE id_volunteer=$id AND id_event=$id_event";
    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    header('Location: add.php ');
?>