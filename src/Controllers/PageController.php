<?php

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\MainService;

class PageController extends Controller{
public $mainservice;

public function __construct(){
$this->mainservice = new Mainservice();
}


public function ShowAction($i){
    $alltasks =$this->mainservice->showAll($i);
    $number=$this->mainservice->showPage();
    $template ='template.php';
    $content='main.php';
    $data=[
        'page_title'=>"Главная",
        'main'=>'main',
        'number'=>$number,
        'alltasks'=>$alltasks,
    ];

    echo $this->renderPage($content, $template, $data);

    }
} 