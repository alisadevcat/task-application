<?php

namespace BeeJee\Web\Base;

class Router
{
  
    public static function run(){
        $controller = 'index'; // имя контроллека по умолчанию
        $action = 'index'; // имя метода по умолчанию
        $params = null;

        // http://front-controller/books/book/1
        $server = $_SERVER;
        $uri = $server['REQUEST_URI'];
        // $uri = '/books/book/1'

        // разбиваем строку /books/book/1 на массив по /
        $routes = explode('/', $uri);
        // $routes = ["","books", "book", "1"]

        // имя контроллера
        if (!empty($routes[1])) {
            $controller = $routes[1];
            // $controller = 'books';
        }
        // имя метода
        if (!empty($routes[2])){
            $action = $routes[2];
            // $action = 'book';
        }
        // параметры
        if (!empty($routes[3])){
            $params = $routes[3];
           // $params = "1";
        }
        // books - BooksController
        // имя класса контроллера
        // $controller = 'Books';
        $controller = 'BeeJee\Web\Controllers\\' .
            ucfirst(strtolower($controller)) .
            'Controller';

        // $controller = 'BooksController';

        // подключаем файл, в котором находится
        // соответствующий контроллер
        // require_once __DIR__ . '/../Controllers/' .
            // $controller . '.php';

        // require_once __DIR__ . '/../Controllers/BooksController.php';

        // создаем объект класса контроллера
        $controller = new $controller();
        // $controller = new BooksController();

        // формируем имя метода
        // $action = 'book' . 'Action';
        $action = strtolower($action) . 'Action';
        // $action = 'bookAction';

        // вызываем метод у созданного объекта, в метод передаем параметры
        $controller->$action($params);
        // $controller->allAction(null);

    }
}

// удаление книги по названию
// books/delete/title
// deleteAction($title){}



