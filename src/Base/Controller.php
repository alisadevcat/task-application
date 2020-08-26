<?php
namespace BeeJee\Web\Base;


abstract class Controller
{
    protected function ajaxResponse($data){
        $response = new Response();
        $response->setBody($data);
        return $response;
    }
    
    protected function renderPage($content, $template, $data=[]){
        // $content имя файла с основным содержимым страницы
        // $template имя файла - шаблона, куда будет подключаться
        // $content
        // $data - массив с данными,
        // которые должны встраиваться в html
        // например, дан массив
        // ['page_title' => 'Главная', 'name' => 'Mike']
        extract($data);
        // после extract мы получим:
        // $page_title = 'Главная';
        // $all_books = [массив с книгами];
        // $name = 'Mike';
        ob_start(); // вывод в буфер
        include_once __DIR__ . '/../Views/' . $template;
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }
}

// abstract Controller - renderPage
// IndexController
// BooksController