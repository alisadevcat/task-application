<?php

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\AccountService;
use BeeJee\Web\Base\Request;


class AuthorisationController extends Controller{
public $accountService;
public $request;

public function __construct(){
$this->accountService = new AccountService();
$this->request = new Request();
}

public function indexAction(){
$auth_data = $this->request->post();
$result =$this->accountService->authUser($auth_data);
if ($result === AccountService::AUTH_SUCCESS){
    $_SESSION['admin'] = true;
}
header('Content-Type: text/plain');
echo $result;

}
public function logoutAction() {
    $_SESSION=[];
    header('Location: /');
}

}
?>