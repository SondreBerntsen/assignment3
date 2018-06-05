<?php
require_once('../model/User.php');
require_once('Controller.php');

class UserController extends Controller{

  public function checkLoginState(){
    $user = new User();
    $user->checkLoginState();
  }
  public function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = [$email, $password];
    $user = new User();
    $user->validateLogin($data);
  }

  public function register(){
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = [$fname, $surname, $password, $email];
    $user = new User();
    $user->validateRegistration($data);
  }

  public function update(){
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];

    $data = [$fname, $surname, $password];
    $user = new User();
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
