<?php
session_start();
require_once "db.php";
$type = $_SESSION['type'];
if ($type != "org")    
    header('Location: index.php ');
$id = $_SESSION['id'];
$valid = $_SESSION['valid'];
$free = $_GET['free'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" media="screen,projection" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">
    <title>UNIVOL</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px; border: 0px solid lightblue; border-radius: 20px; ">
                    <div class="card-body" style="border-radius: 20px; ">
                            <center>
                            <?php
                            if (empty($free)) echo '<h3><b style="color: green">Просмотр заявок</b></h3>';
                            else  echo '<h3><b style="color: green">Свободные волонтёры</b></h3>'; ?>
                            </center>
                    </div>
                </div>
                    <?php
                        if (empty($free)) {
                            $sql = "SELECT * FROM volunteers WHERE id_org = $id ORDER BY id DESC";
                            $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                            while ($row = mysqli_fetch_array($result)) {                            
                                $name = $row['name'];
                                $about = $row['about'];
                                $phone = $row['phone'];
                                $phone = "<a href='tel:".$phone."'><h6 style='display: inline; color: blue'>".$phone."</h6></a>";
                                $email = $row['email'];
                                $email = "<a href='mailto:".$email."'><h6 style='display: inline; color: blue'>".$email."</h6></a>";
                                $links = $row['link'];
                                $pos = strripos($links, '.');
                                if ($pos)
                                    $links = "<a href='http://".$links."'><h6 style='display: inline; color: blue'>".$links."</h6></a>";
                                $valid = $row['valid'];
                                $id_event = $row['id_event'];
                                $id_volunteer = $row['id_volunteer'];
                                $sqli = "SELECT * FROM events WHERE id = $id_event";
                                $resulti = mysqli_query($link, $sqli) or die("Ошибка " . mysqli_error($link));
                                $rowi = mysqli_fetch_array($resulti);                        
                                $event = $rowi['event'];
                                echo "
                                    <div class='card' style='margin: 20px 0; border-radius: 20px;'> 
                                        <div class='card-body'>
                                            <div class='row'>
                                                <div class='col'>
                                                    <h4>Название: <b>$name</b></h4>
                                                    <div class='alert alert-dark'>
                                                        <h6>$about</h6>
                                                    </div>
                                                    <h6>Телефон: $phone | E-mail: $email | Ссылки: $links</h6>
                                                </div>
                                            </div>
                                            <small style='position: absolute; right: 10px; bottom: 10px;'>Название события: <b>$event</b></small>";
                                            if ($valid != 0)
                                                echo "<button class='btn btn-success' disabled>Заявка принята</button>";
                                            else {
                                            echo "<a href='delete.php?id=$id_volunteer&id_event=$id_event'><button class='btn btn-danger'>Отклонить</button></a>
                                            <a href='success.php?id=$id_volunteer&id_event=$id_event'><button class='btn btn-success'>Принять</button></a>";
                                            }
                                        echo "</div>
                                    </div>   
                                ";
                            }
                        } else {
                            $sql = "SELECT * FROM volunteers WHERE id_org = 0 ORDER BY id DESC";
                            $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                            while ($row = mysqli_fetch_array($result)) {                            
                                $name = $row['name'];
                                $about = $row['about'];
                                $phone = $row['phone'];
                                $phone = "<a href='tel:".$phone."'><h6 style='display: inline; color: blue'>".$phone."</h6></a>";
                                $email = $row['email'];
                                $email = "<a href='mailto:".$email."'><h6 style='display: inline; color: blue'>".$email."</h6></a>";
                                $links = $row['link'];
                                $pos = strripos($links, '.');
                                if ($pos)
                                    $links = "<a href='http://".$links."'><h6 style='display: inline; color: blue'>".$links."</h6></a>";
                                $valid = $row['valid'];
                                $id_event = $row['id_event'];
                                $id_volunteer = $row['id_volunteer'];                                
                                echo "
                                    <div class='card' style='margin: 20px 0; border-radius: 20px;'> 
                                        <div class='card-body'>
                                            <div class='row'>
                                                <div class='col'>
                                                    <h4>Название: <b>$name</b></h4>
                                                    <div class='alert alert-dark'>
                                                        <h6>$about</h6>
                                                    </div>
                                                    <h6>Телефон: $phone | E-mail: $email | Ссылки: $links</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                ";
                            }
                        }
                    ?>
            </div>
            <div class="col-3">
                <div class="card" style="margin-top: 20px; width: 300px; border-radius: 20px; position: fixed;">
                    <div class="card-body">                    
                        <center>
                            <h5><b>НАВИГАЦИЯ</b></h5>
                            <hr>
                            <p><a href="index.php">Главная</a></p>
                            <?php
                            if ($_SESSION['online'] == 1) {
                                $sqli = "SELECT * FROM volunteers WHERE id_org = 0 AND id_volunteer=$id";
                                $resulti = mysqli_query($link, $sqli) or die("Ошибка " . mysqli_error($link));
                                $rowi = mysqli_fetch_array($resulti);
                                if ($_SESSION['type'] == "admin")
                                    echo "<p><a href='orgs.php'>Заявки организаторов</a></p>";
                                if ($_SESSION['type'] == "volunteer" && empty($rowi['id']))
                                    echo "<p><a href='volunteerForm.php?id=12&id_org=0'>Свободная форма</a></p>";
                                if ($_SESSION['type'] == "volunteer" && !empty($rowi['id']))
                                    echo "<p><a href='volunteerForm.php?id=12&id_org=0&edit=1'>Изменить свободную форму</a></p>";
                                if ($_SESSION['type'] == "org" && $_SESSION['valid'] == 1)
                                    echo "<p><a href='eventForm.php'>Создать событие</a></p>
                                    <p><a href='add.php'>Посмотреть заявки</a></p>
                                    <p><a href='add.php?free=1'>Свободные волонтеры</a></p>";
                                if ($_SESSION['type'] == "org" && $_SESSION['valid'] == 0)
                                    echo "<p><b  style='color: red'>ВАША АКАУНТ НЕ ПОДТВЕРЖДЁН!</b></p>";
                                echo '<hr><p><a href="exit.php">Выход</a>';
                            }
                            else
                                echo '<hr><p><a href="regForm.php">Регистрация</a></p>
                                <p><a href="authForm.php">Войти</a>'
                            ?>
                        </center>
                    </div>
                </div>
            </div>
        </div>          
    </div>
    <script>
    </script>
</body>
</html>