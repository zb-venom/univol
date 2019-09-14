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
    <title>Авторизация</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                
                        <div class="card" style="width: 50%; margin: auto; margin-top: 10%; margin-bottom: 10%; text-align: center;">
                            <div class="card-body">
                                <h5 class="card-title">АВТОРИЗАЦИЯ</h5>
                                <hr>
                                <small style="color: red" id="error"></small>
                                <p></p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Login</span>
                                    </div>
                                    <input type="text" id="login" class="form-control" placeholder="Login" aria-label="Login">
                                </div>    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Пароль</span>
                                    </div>
                                    <input type="password" id="pass" class="form-control" placeholder="Пароль" aria-label="Пароль">
                                </div> 
                                <button type="button" id="done" class="btn btn-outline-success">ЗАВЕРШИТЬ</button>
                            </div>
                        </div>
            </div>
        </div>          
    </div>
    <script>
        function done() {
            $.ajax({
                url:"auth.php.",
                method:"POST",
                data: { login: document.getElementById("login").value, 
                        password: document.getElementById("pass").value },
                success: function(data) {                    
                    if (data == "success")
                        location.href = 'index.php';
                    else
                        error.innerHTML = data;
                },
                failure: function(data) { 
                    alert('Got an error dude');
                }});
        }
        document.getElementById("done").onclick =  function() {
        if (document.getElementById("login").value == "" || 
            document.getElementById("pass").value == "")
            alert ("Заполните все поля!");
        else
            done();
        }
    </script>
</body>
</html>


<?php
    session_start();
    $online = $_SESSION['online'];
    if ($online == 1)
        header('Location: index.php ');
        
?>