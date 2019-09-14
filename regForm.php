<?php
    session_start();
    $online = $_SESSION['online'];
    if ($online == 1)
        header('Location: index.php ');       
        
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
    <title>Регистрация</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="tab-content">
                    <div class="tab-pane" id="volunteerForm">
                        <div class="card" style="width: 50%; margin: auto; margin-top: 10%; border-radius: 20px; margin-bottom: 10%; text-align: center;">
                            <div class="card-body">
                                <h5 class="card-title">РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЯ</h5>
                                <hr>
                                <small style="color: red" id="Verror"></small>
                                <p></p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Login</span>
                                    </div>
                                    <input type="text" id="Vlogin" class="form-control" placeholder="Login" aria-label="Login">
                                </div>    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ФИО</span>
                                    </div>
                                    <input type="text" id="fname" placeholder="Фамилия" aria-label="Фамилия" class="form-control">
                                    <input type="text" id="sname" placeholder="Имя" aria-label="Имя" class="form-control">
                                    <input type="text" id="tname" placeholder="Отчество" aria-label="Отчество" class="form-control">
                                </div>   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Номер телефона</span>
                                    </div>
                                    <input type="text" id="Vphone" class="form-control" placeholder="+7-(***)-***-****" aria-label="Номер телефона">
                                </div>  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">E-mail</span>
                                    </div>
                                    <input type="text" id="Vemail" class="form-control" placeholder="example@example.com" aria-label="E-mail">
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Пароль</span>
                                    </div>
                                    <input type="password" id="Vpassword" class="form-control" placeholder="Пароль" aria-label="Пароль">
                                    <input type="password" id="Vspassword" class="form-control" placeholder="Повторите пароль" aria-label="Повторите пароль">
                                </div> 
                                <button type="submit" id="doneVol" class="btn btn-outline-success">ЗАВЕРШИТЬ</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="orgForm">
                        <div class="card" style="width: 50%; margin: auto; margin-top: 1%; border-radius: 20px; text-align: center;">
                            <div class="card-body">
                                <h5 class="card-title">РЕГИСТРАЦИЯ ОРГАНИЗАЦИИ</h5>
                                <hr>
                                <small style="color: red" id="Oerror"></small>
                                <p></p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Login</span>
                                    </div>
                                    <input type="text" id="Ologin" class="form-control" placeholder="Login" aria-label="Login">
                                </div>    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Название</span>
                                    </div>
                                    <input type="text" id="name" placeholder="Название" aria-label="Название" class="form-control">
                                </div>   
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Номер телефона</span>
                                    </div>
                                    <input type="text" id="Ophone" class="form-control" placeholder="+7-(***)-***-****" aria-label="Номер телефона">
                                </div>  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">E-mail</span>
                                    </div>
                                    <input type="text" id="Oemail" class="form-control" placeholder="example@example.com" aria-label="E-mail">
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Ссылки</span>
                                    </div>
                                    <textarea type="text" id="link" class="form-control" placeholder="Ссылки" aria-label="Ссылки"></textarea>
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Описание</span>
                                    </div>
                                    <textarea type="text" id="about" rows="4" class="form-control" placeholder="Описание" aria-label="Описание"></textarea>
                                </div> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Пароль</span>
                                    </div>
                                    <input type="password" id="Opassword" class="form-control" placeholder="Пароль" aria-label="Пароль">
                                    <input type="password" id="Ospassword" class="form-control" placeholder="Повторите пароль" aria-label="Повторите пароль">
                                </div> 
                                <button type="button" id="doneOrg" class="btn btn-outline-success">ЗАВЕРШИТЬ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="border-radius: 20px;" >
                <div class="modal-header" style="margin: auto;">
                  <h5 class="modal-title">Зарегистрироваться как</h5>
                </div>
                <div class="modal-body" style="margin: auto;">
                    <button type="button" id="volunteer" class="btn btn-outline-success">Волонтер</button>
                    <button type="button" id="org" class="btn btn-outline-primary">Организация</button>
                </div>
              </div>
            </div>
    <script>
        $('#myModal').modal('show');
        document.getElementById("volunteer").onclick = function() {
            $('#myModal').modal('hide');
            $('#volunteerForm').tab('show');
            $('#orgForm').empty();
        }
        function doneVol() {   
            $.ajax({
                url:"reg.php.",
                method:"POST",
                data: {                
                    login: document.getElementById("Vlogin").value, 
                    name: document.getElementById("fname").value + " " + document.getElementById("sname").value + " " + document.getElementById("tname").value, 
                    phone: document.getElementById("Vphone").value, 
                    email: document.getElementById("Vemail").value, 
                    password: document.getElementById("Vpassword").value,
                    type: "volunteer"
                },
                success: function(data) {                    
                    if (data == "success")
                        location.href = 'index.php';
                    else
                        Verror.innerHTML = data;
                },
                failure: function(data) { 
                    alert('Got an error dude');
                }});   
        }
        function doneOrg() {   
            $.ajax({
                url:"reg.php.",
                method:"POST",
                data: {                
                    login: document.getElementById("Ologin").value, 
                    name: document.getElementById("name").value, 
                    phone: document.getElementById("Ophone").value, 
                    email: document.getElementById("Oemail").value, 
                    link: document.getElementById("link").value, 
                    about: document.getElementById("about").value, 
                    password: document.getElementById("Opassword").value,
                    type: "org"
                },
                success: function(data) {                    
                    if (data == "success")
                        location.href = 'index.php';
                    else
                        Oerror.innerHTML = data;
                },
                failure: function(data) { 
                    alert('Got an error dude');
                }});         
        }
        document.getElementById("doneOrg").onclick =  function() {
            if (document.getElementById("Opassword").value != document.getElementById("Ospassword").value )
                alert("Пароли не совпадают!");
            else { 
                if (document.getElementById("Ologin").value == ""|| 
                    document.getElementById("name").value == "" ||
                    document.getElementById("Ophone").value == "" ||
                    document.getElementById("Oemail").value == "" ||
                    document.getElementById("link").value == "" ||
                    document.getElementById("about").value == "" ||                    
                    document.getElementById("Opassword").value == "")
                    Oerror.innerHTML = "Заполните поля!";
                else
                    doneOrg();
            }
        }
        document.getElementById("doneVol").onclick =  function() {
            if (document.getElementById("Vpassword").value != document.getElementById("Vspassword").value )
                alert("Пароли не совпадают!");
            else { 
                if (document.getElementById("Vlogin").value == "" || 
                    document.getElementById("fname").value == "" ||
                    document.getElementById("sname").value == "" ||
                    document.getElementById("tname").value == "" ||
                    document.getElementById("Vphone").value == "" ||
                    document.getElementById("Vemail").value == "" ||                   
                    document.getElementById("Vpassword").value == "")
                    Verror.innerHTML = "Заполните поля!";
                else
                    doneVol();
            }
        }
        document.getElementById("org").onclick = function() {
            $('#myModal').modal('hide');
            $('#orgForm').tab('show');
            $('#volunteerForm').empty();
        }
    </script>
</body>
</html>
