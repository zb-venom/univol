<?php
session_start();

require_once "db.php";
require_once "salt.php";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$about = $_POST['about'];
$links = $_POST['link'];
$id = $_POST['id'];
$edit = $_POST['edit'];
$id_event = $_POST['id_event'];
$id_org = $_POST['id_org'];

if (empty($edit))
    $sql = "INSERT INTO volunteers (`id_volunteer`, `id_org`, `id_event`, `name`, `about`, `email`, `phone`, `city`, `link`) VALUES('$id', '$id_org', '$id_event','$name','$about', '$email', '$phone', '$city', '$links')";
else 
    $sql = "UPDATE volunteers SET `name`='$name', `about`='$about', `email`='$email', `phone`='$phone', `city`='$city', `link`='$links' WHERE id_volunteer=$id";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
if ($result==true) {
    echo "success";
    exit();
} else {
    echo "Данные введены неверно!";
    exit();
}
?>