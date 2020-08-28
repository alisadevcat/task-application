<?php

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\MainService;
use BeeJee\Web\Base\Request;

class TasksController extends Controller{
public $mainservice;
public $request;


public function __construct(){
$this->mainservice = new Mainservice();
$this->request = new Request();
}

public function addAction(){
    // if ($server['REQUEST_METHOD'] === 'POST'){
    //     $post = $_POST; 
$data=$this->request->post();

$added =$this->mainservice->addTask($data);

echo $added ;
}


public function editAction($id){

$data=$this->request->post();

$tasks =$this->mainservice->getTasksById($id);
var_dump($task);
$template ='template.php';
$content='update.php';
$data = [
    'page_title'=>"Изменение задачи",
    'main'=>'main',
    'tasks'=>$tasks
];

echo $this->renderPage($content, $template, $data);
}

public function saveAction($id){

    $data=$this->request->post();
    
    $added =$this->mainservice->saveTask($data);
    
    echo $added;
    }
}