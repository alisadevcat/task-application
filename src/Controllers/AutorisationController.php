<?php

namespace BeeJee\Web\Controllers;
use BeeJee\Web\Base\Controller;
use BeeJee\Web\Models\AccountService;

class AutorisationController extends Controller{
public $accountService;


public function __construct(){
$this->mainservice = new AccountService();

}

public function IndexAction(Request $request){

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$auth_data = $_POST;
}

$result =$this->accountService->authUser($auth_data);
if ($result === AccountService::AUTH_SUCCESS){
    $_SESSION['email'] = $auth_data['email'];
}
echo $result;

}
public function logoutAction() {
    $_SESSION=[];
    header('Location: /');
}

}
?>