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

$template ='template.php';
$content='update.php';
$data = [
    'page_title'=>"Изменение задачи",
    'main'=>'update',
    'tasks'=>$tasks
];

echo $this->renderPage($content, $template, $data);
}

public function saveAction($id){

    $saved_data=$this->request->post();

    $saved =$this->mainservice->saveTask($saved_data, $id);
    
    echo $saved;
    }
}