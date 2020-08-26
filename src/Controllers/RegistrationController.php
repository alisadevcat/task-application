<?php

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\AccountService;
// use BeeJee\Web\Base\Request;

class RegistrationController extends Controller{
public $accountService;


public function __construct(){
$this->mainservice = new AccountService();

}

public function IndexAction(){
    $server=$_SERVER;
if ($server['REQUEST_METHOD'] === 'POST') {
    $reg_data= $_POST; 
}

$result = $this->accountService->regUser($reg_data);

if ($result === AccountService::REG_SUCCESS){
    $_SESSION['email'] = $reg_data['email'];
}   
  echo $result;
}
}

?>