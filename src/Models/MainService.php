<?

namespace BeeJee\Web\Models;
use BeeJee\Web\Base\DBConnection;
use BeeJee\Web\Base\Controller\IndexController;

class MainService{

const TASK_OK ="Задача добавлена";
const TASK_FAIL="Данные не внесены";
const TASK_EDITED ="Задача добавлена";

const TASK_SAVED ="Задача сохранена";
const TASK_UNSAVED ="Задача не сохранена";
protected $dbConnection;

public function __construct(){
$this->dbConnection= DBConnection::getInstance();
}

public function showAll($page){
$limit = 3;
$offset = $limit * ($page-1);
$sql ="SELECT * FROM tasks LIMIT $limit OFFSET $offset";
$dbConnection = $this->dbConnection->getConnection();
$result= $this->dbConnection-> queryAll($sql);
return $result;
}


public function showPage(){
        $pageNum = 3;
        $sql ="SELECT COUNT(*) as count FROM tasks";
        $dbConnection = $this->dbConnection->getConnection();
        $result= $this->dbConnection->queryAll($sql);
        $count=$result[0]['count'];
        $numPage= ceil($count/$pageNum);
        return $numPage;
        }

public function showSort($id, $page) {
        $sql ="SELECT * FROM tasks ";
        $limit = 3;
        $offset = $limit * ($page-1);
        $done= "ВЫПОЛНЕНА";
        $undone="НЕ ВЫПОЛНЕНА";
        if($id){
                if($id == 'nameAsc') {
                $sql .= "ORDER BY name ASC LIMIT $limit OFFSET $offset";
                }
                else if ($id == 'nameDesc') {
                $sql .= "ORDER BY name DESC LIMIT $limit OFFSET $offset";
                }
                else if ($id == 'emailAsc') {
                $sql .= " ORDER BY email ASC LIMIT $limit OFFSET $offset";
                }
                else if ($id == 'emailDesc') {
                $sql .= "ORDER BY email DESC  LIMIT $limit OFFSET $offset";
                }
                else if ($id == 'done') {
                $sql .= "WHERE status ='$done' LIMIT $limit OFFSET $offset";
                }
                else if ($id == 'undone') {
                $sql .= "WHERE status ='$undone' LIMIT $limit OFFSET $offset";
                }
        }
        $dbConnection = $this->dbConnection->getConnection();
        return $this->dbConnection->queryAll($sql);
       }

       public function addTask($data){

        $sql = 'INSERT INTO tasks(name, email, textarea, status)
        VALUES (:task_name, :task_email,:task_text, :task_status)';
        
        $params = [
                'task_name' => $data['name'],
                'task_email' => $data['email'],
                'task_text'=>$data['textarea'],
                'task_status'=>$data['status'][0]
                ];
        
        $dbConnection = $this->dbConnection->getConnection();
        return $this->dbConnection->executeSql($sql, $params);
        }  


        public function saveTask($saved_data, $id){
                $sql = "UPDATE tasks SET name = :name, email = :email, textarea = :textarea , status= :status where id = :id";
                $params =[
                        'name' => trim($saved_data['name']),
                        'email'=> trim( $saved_data['email']),
                        'textarea'=> trim($saved_data['textarea']),
                        'status' => trim($saved_data['status'][0]),
                        'id'=>$id
                ];
                
                        $dbConnection = $this->dbConnection->getConnection();
                        return $this->dbConnection->executeSql($sql, $params);
                        }

        public function getAddited($saved_data, $id){
                if ($this->saveTask($saved_data, $id)!==true){
                   return $this->getTasksById($id);
                }
        }
                public function getData($data){
                return $data;
        }
        public function getTasksById($id){
        $sql ='SELECT * FROM tasks where id =:id;';
        $params =['id'=> $id];
        $dbConnection = $this->dbConnection->getConnection();
        return $this->dbConnection->execute($sql, $params, true);
        }

}