<!-- Стартовая страница - список задач с возможностью сортировки по имени пользователя, email и статусу.
- Вывод задач нужно сделать страницами по 3 штуки (с пагинацией).
- Видеть список задач и создавать новые может любой посетитель без авторизации. -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/<?echo $main;?>.css">
    <title><?echo $page_title?></title>
</head>
<header>
    <h2>TO DOTASK APPLICATION </h2>
    <div class="flex-row">
    <a href= "/autorisation/">Войти</a>
    <a href="/registration/">Регистрация</a>
    <a href="/logout/">Выйти</a>
    </div>
</header>
<img src="/static/img/todo.jpg" class="container">
<body class="container">
    
<?include_once $content ?>
</body>

</html>