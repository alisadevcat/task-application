<?

namespace BeeJee\Web\Models;
use BeeJee\Web\Base\DBConnection;
use BeeJee\Web\Base\Controller\IndexController;

class AccountService{

const USER_EXISTS ="Пользователь уже существует";
const INSERT_FAIL="Данные не внесены";
const REG_SUCCESS="Регистрация успешна";
const EMAIL_ERROR="Такой пользователь уже есть";
const AUTH_PWD_ERROR='Неверный пароль';
const AUTH_SUCCESS ='Авторизация успешна';

protected $dbConnection;

public function __construct(){
$this->dbConnection= DBConnection::getInstance();
}

public function regUser(array $reg_data){
    
    $pwd = $reg_data['password'];
    $re_pwd = $reg_data['re_password'];
    $email = $reg_data['email'];

    //проверка на уже имеющийся email в бд
    if ($this->getUser($email)) return self::USER_EXISTS;
    //шифрование пароля
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    //запись данных в бд user_info
    $sql ="INSERT INTO users(id,  email, password)
    VALUES(:id, :user_email, :user_pwd );";
    $params=[
        'id'=>$this->dbConnection->getConnection()->lastInsertId(),
        'user_pwd'=>$pwd,
        'user_email'=>$email
    ];
    return $this->dbConnection->executeSql($sql, $params)? self:: REG_SUCCESS : self::INSERT_FAIL;  
}

public function authUser(array $auth_data){
   
    $password = $auth_data['password'];
    $email = $auth_data['email'];
    
    //обращаемся к бд, ищем соотвествия, если да, возвращаем ответ

        $user =$this->getUser($email);
        if(!$user)return self::EMAIL_ERROR;

        if(!password_verify($password, $user['password'])){
            return self::AUTH_PWD_ERROR;
        }
        return self::AUTH_SUCCESS;
}

 //получаем email из бд
 private function getUser($email){
    $sql = 'select * from users where email = :email';
    $dbConnection = $this->dbConnection->getConnection();
    $user = $this->dbConnection->execute($sql, ['email' => $email], false);
    return $user;
}

}
