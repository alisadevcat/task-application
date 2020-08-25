<?php

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\MainService;

class IndexController extends Controller{
public $mainservice;

public function __construct(){
$this->mainservice = new Mainservice();
}

public function indexAction(){
$page = isset($_GET['page'])?$_GET['page']:1;

$alltasks =$this->mainservice->showAll($page);
$number=$this->mainservice->showPage();


$template ='template.php';
$content='main.php';
$data = [
    'page_title'=>"Главная",
    'main'=>'main',
    'number'=>$number,
    'alltasks'=>$alltasks
];

echo $this->renderPage($content, $template, $data);
}
  

}