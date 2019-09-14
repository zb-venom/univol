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
$category = $_POST['category'];
$id = $_POST['id'];
$id_event = $_POST['id_event'];

$sql = "INSERT INTO events (`id_org`, `event`, `about`, `email`, `phone`, `city`, `link`, `category`) VALUES('$id','$name','$about', '$email', '$phone', '$city', '$links', '$category')";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
if ($result==true) {
    echo "success";
    exit();
} else {
    echo "Данные введены неверно!";
    exit();
}
?>