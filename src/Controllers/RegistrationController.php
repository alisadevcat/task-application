<?php

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\AccountService;
use BeeJee\Web\Base\Request;


class RegistrationController extends Controller{
public $accountService;
public $request;

public function __construct(){
$this->accountService = new AccountService();
$this->request = new Request();
}

public function indexAction(){
$reg_data = $this->request->post();
$result =$this->accountService->regUser($reg_data);
if ($result === AccountService::REG_SUCCESS){
    $_SESSION['admin'] = true;
}
echo $result;

}
public function logoutAction() {
    $_SESSION=[];
    header('Location: /');
}

}
?>