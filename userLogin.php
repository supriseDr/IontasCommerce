<?php 

require_once "bootstrap.php";

//Login Errors Exceptions

use Jasny\Auth\LoginException;

try {
    //$auth->login($_POST['Kenneth Leannon'], $_POST['password']);
    $auth->login('Andre Skiles', 'password');
    var_dump($auth->isLoggedIn());
} catch (LoginException $exception) {
    http_response_code(400);
    echo $exception->getMessage();
}

//echo $auth->is('user');
var_dump($auth->user()->getAuthId());

//var_dump($auth->time());

