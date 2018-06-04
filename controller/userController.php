<?php
require_once('../model/User.php');
require_once('Controller.php');

class UserController extends Controller{

  $user = new User();

  public function checkLoginState(){
    $user->checkLoginState();
  }
  public function Login(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = [$email, $password];
    $user->validateLogin($data);
  }

  public function register(){
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = [$fname, $surname, $password, $email];
    $user->validateRegistration($data);
  }

  public function update(){
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];

    $data = [$fname, $surname, $password];

    $user->update();
  }
}

if(isset($_POST['action'])) {

  $controller = new UserController();

  $action = $_POST['action'];
  switch($action) {
    case 'checkLoginState':
      $controller->checkLoginState();
      break;
    case 'login':
      $controller->login();
      break;
    case 'register':
      $controller->register();
      break;
    case 'update':
      $controller->update();
      break;
  }
}
?>
