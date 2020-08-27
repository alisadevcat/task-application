<?

namespace BeeJee\Web\Models;
use BeeJee\Web\Base\DBConnection;


class AccountService{

const USER_EXISTS ="Пользователь уже существует";
const INSERT_FAIL="Данные не внесены";
const REG_SUCCESS="Регистрация успешна";
const NAME_ERROR="Такоuго имени нет";
const AUTH_PWD_ERROR ='Неверный пароль';
const AUTH_SUCCESS ='Авторизация успешна';

protected $dbConnection;

public function __construct(){
$this->dbConnection= DBConnection::getInstance();
}

public function regUser($reg_data){

    //если пустой массив и нет ошибок, объявляем переменные полей
     $name = $reg_data['login'];
     $pwd = $reg_data['password'];

     if (($pwd == 123) && ($name =="admin")){
        $role == true;
        $_SESSION['admin'] = true; 
}
  

    //проверка на уже имеющийся email в бд
    if ($this->getUser($name)) return self::USER_EXISTS;

    //шифрование пароля
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    //запись данных в бд 
    $sql ="INSERT INTO users(id, login, password, admin)
    VALUES(:id, :user_name, :user_pwd, :role);";
    $params=[
        'id'=>$this->dbConnection->getConnection()->lastInsertId(),
        'user_name'=>$name,
        'user_pwd'=>$pwd,
        'role'=>$role
    ];
    return $this->dbConnection->executeSql($sql, $params)? self:: REG_SUCCESS : self::INSERT_FAIL;  
}


public function authUser($auth_data){
   
    $password = $auth_data['password'];
    $name = $auth_data['login'];
    
    //обращаемся к бд, ищем соотвествия, если да, возвращаем ответ

        $user =$this->getUser($name);
        if(!$user)return self::NAME_ERROR;

        
        if(!password_verify($password, $user['password'])){
            return self::AUTH_PWD_ERROR;
        }
        return self::AUTH_SUCCESS;
}

 //получаем email из бд
 private function getUser($name){
    $sql = 'select * from users where login = :name';
    $dbConnection = $this->dbConnection->getConnection();
    $user = $this->dbConnection->execute($sql, ['name' => $name], false);
    return $user;
}

}
