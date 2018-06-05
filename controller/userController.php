<?php
require_once('../model/User.php');
require_once('Controller.php');

class UserController extends Controller{

  public function checkLoginState(){
    $user = new User();
    $user->checkLoginState();
  }
  public function login(){
    if(
      !empty($_POST['ext_email']) &&
      !empty($_POST['ext_pwd'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = [$email, $password];
        $user = new User();
        $user->validateLogin($data);
    }else{
      echo "Empty values";
    }
  }

  public function register(){
    if(
      !empty($_POST['firstName']) &&
      !empty($_POST['lastName']) &&
      !empty($_POST['email']) &&
      !empty($_POST['password'])){
        $fname = $_POST['firstName'];
        $surname = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = [$fname, $surname, $password, $email];
        $user = new User();
        $user->validateRegistration($data);
    }else{
      echo "qweqweqwe";
    }
  }

  public function update(){
    if(
      !empty($_POST['firstName']) &&
      !empty($_POST['lastName']) &&
      !empty($_POST['email']) &&
      !empty($_POST['password'])){
        $fname = $_POST['firstName'];
        $surname = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = [$fname, $surname, $email, $password];
        $user = new User();
        $user->update();
    }else{
      echo "false";
    }
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
