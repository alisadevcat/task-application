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
    'tasks'=>$tasks
];

echo $this->renderPage($content, $template, $data);
}

public function saveAction($id){
    $data=$this->request->post();
    $saved_data=$this->mainservice->getTasksById($id);
    $result =$this->mainservice->saveTask($data, $id);
    $updatedData =$this->mainservice->getAddited($data, $id);
    var_dump($saved_data[0]['name']);
    var_dump($updatedData[0]['name']);
   if ($result !== true){
       if(
        ($updatedData[0]['name']!== $saved_data[0]['name'])||
       ($updatedData[0]['email']!== $saved_data[0]['email']) ||
       ($updatedData[0]['textarea']!== $saved_data[0]['textarea'])||
       ($updatedData[0]['status']!==$saved_data[0]['status'])){
        $_SESSION['edit'] = true;
        $_SESSION['id_edit'] = $id;
       }
    }
    header('Content-Type: text/plain');
    echo $result;
}

}