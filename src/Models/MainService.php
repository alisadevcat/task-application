<?

namespace BeeJee\Web\Models;
use BeeJee\Web\Base\DBConnection;
use BeeJee\Web\Base\Controller\IndexController;

class MainService{
const TASK_OK ="Задача добавлена";
const TASK_FAIL="Данные не внесены";
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
                else if ($id == 'statusSort') {
                $sql .= " ORDER BY status ASC  LIMIT $limit OFFSET $offset";
                        }
        }
        
        $dbConnection = $this->dbConnection->getConnection();
        return $this->dbConnection->queryAll($sql);
       }

public function addTask(array $data){

$sql = 'INSERT INTO tasks(name, email, textarea, status)
VALUES (:task_name, :task_email,:task_text, :task_status)';

$dbConnection = $this->dbConnection->getConnection();


$params = [
        'task_name' => $data['name'],
        'task_email' => $data['email'],
        'task_text'=>$data['textarea'],
        'task_status'=>$data['hero'][0]
        ];

return $this->dbConnection->executeSql($sql, $params)? self:: TASK_OK : self::TASK_FAIL;
}

}