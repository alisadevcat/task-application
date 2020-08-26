<!-- Стартовая страница - список задач с возможностью сортировки по имени пользователя, email и статусу.
- Вывод задач нужно сделать страницами по 3 штуки (с пагинацией).
- Видеть список задач и создавать новые может любой посетитель без авторизации. -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/static/css/main.css">
    <title><?echo $page_title?></title>
</head>
<header>
<h2>TO DOTASK APPLICATION </h2>

<div class="form_window none flex-column">
<h3>Авторизация</h3>
<form name="authForm" action="/authorisation" method="POST">
<input required type="text" name="login"placeholder ="Ваш логин">
<span class="auth_email"></span>
<input required type="password"name ="password" placeholder ="Ваш пароль">
<span class="auth_password"></span>
<input required type="submit" value="Войти"class="button">
<span class="auth_result"></span>
<button class="close_modal">x</button>
</form>
</div>


    <div class="flex-auth container">
    <a href= "/autorisation/" class ="auth">Войти</a>
    <a href="/registration/" class="reg_a">Регистрация</a>

    <? if ($_SESSION['user_role'] == 'admin')
    echo "<a href='/authorisation/logout/'>Выйти</a>"
    ?>
    </div>
</header>
<img src="/static/img/todo.jpg" class="container">
<body class="container">
    
<?include_once $content ?>

<script src="/static/js/general.js"></script>
<script src="/static/js/auth.js"></script>
</body>

</html>