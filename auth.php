<?php 

    require_once "db.php";
    require_once "salt.php";

    session_start();

    $login = $_POST['login']; 
    $login = preg_replace('/\s+/', '', $login);
    $_SESSION['login'] = $login; 
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_array($result);
    if ($row['password']==md5(md5($row['salt']).md5($password))) {
            $_SESSION['id']=$row['id']; 
            $_SESSION['online']=1;
            $_SESSION['type'] = $row['type'];
            $_SESSION['valid'] = $row['valid'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['email'] = $row['email'];
            echo 'success';
            exit();
    } else {
        echo "Данные введены неверно!";
        exit();
    } 
    
?>