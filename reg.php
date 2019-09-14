<?php
session_start();

require_once "db.php";
require_once "salt.php";
$login = $_POST['login'];
$login = preg_replace('/\s+/', '', $login);
$_SESSION['login'] = $login;
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$links = $_POST['link'];
if (empty($links) )
    $links = "Ссылок нет!";
$phone = $_POST['phone'];
$about = $_POST['about'];
if (empty($about) )
    $about = "Описания нет!";
$type = $_POST['type'];
if (empty($password) || empty($login)) { 
                    exit();
}
$sql = "SELECT * FROM users WHERE login='$login'";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$isLoginFree = mysqli_fetch_assoc($result);
if (!empty($isLoginFree)) {
    echo "Занят";
    exit();
}

$salt = generateSalt();

$pass = md5(md5($salt).md5($password));

$sql = "INSERT INTO users (`login`, `password`, `salt`, `type`, `name`, `phone`, `link`, `email`, `about`) VALUES('$login','$pass','$salt', '$type', '$name', '$phone', '$links', '$email', '$about')";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
if ($result==true) {
    echo "success";
    exit();
} else {
    echo "Данные введены неверно!";
    exit();
}
?>