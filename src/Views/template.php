<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../static/css/main.css">
   
    <title><?echo $page_title?></title>
</head>
<header class="container">
<div class ="header-container">
    <div class="flex-row">  
            <h5 class="block">TASK APPLICATION </h5>
            <div class="flex-auth ">
            <a href= "/autorisation/" class ="auth">Войти</a>
            <? if($_SESSION['admin'] === true)
            echo "<a href='/authorisation/logout/'>Выйти</a>"
            ?>
            <a href="/registration/" class="reg_a">Регистрация</a>
            </div>
        </div>
    <div class="form_window none">
        <h4>Авторизация</h4>
        <form name="authForm" action="/authorisation/" method="POST">
            <button class="close_modal">x</button>
            <input required type="text" name="login" placeholder ="Ваш логин">
            <span class="auth_email"></span>
            <input required type="password"name ="password" placeholder ="Ваш пароль">
            <input required type="submit" value="Войти"class="button">
            <span class="auth_password"></span>
            <span class="auth_result block"></span>
        </form>
    </div>

    <div class="form_window_reg none">
        <h4>Регистрация</h4>
        <form name="regForm" action="/registration/" method="POST">
            <button class="close_modal_reg">x</button>
            <input required type="text" name="login" placeholder ="Ваш логин">
            <span class="reg_name"></span>
            <input required type="password"name ="password" placeholder ="Ваш пароль">
            <span class="reg_password"></span>
            <input required type="submit" value="Зарегистрироваться"class="button">
            <span class="reg_result block"></span>
        </form>
    </div>
</div>
</header>
<body class="container">
    <img src="../../static/img/todo.JPG" class="container" alt ="todo">
        
    <?include_once $content ?>
    <script src="../../static/js/auth.js"></script>
    <script src="../../static/js/general.js"></script>
    
</body>

</html>