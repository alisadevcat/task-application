<?

namespace BeeJee\Web\Models;
use BeeJee\Web\Base\DBConnection;
use BeeJee\Web\Base\Controller\IndexController;

class MainService{
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

public function showSort($id = FALSE) {
        //Запрос на выборку все товаров
        $sql = "SELECT * FROM tasks";
        
        if($id){
                if($id == 'namea') {
                $sql .= ' ORDER BY title ASC';
                }
                else if ($id == 'named') {
                $sql .= ' ORDER BY title DESC';
                }
                else if ($id == 'pricea') {
                $sql .= ' ORDER BY price ASC';
                }
                else if ($id == 'priced') {
                $sql .= ' ORDER BY price DESC';
                }
        }
        
        $dbConnection = $this->dbConnection->getConnection();
        return $this->dbConnection->queryAll($sql);

       }

}