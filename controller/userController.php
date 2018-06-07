<?php
require_once('../model/User.php');
require_once('../model/Item.php');
require_once('Controller.php');

class UserController extends Controller{

  public function checkLoginState(){
    $user = new User();
    $user->checkLoginState();
  }
  public function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->validateLogin($email, $password);

  }

  public function register(){
    if(
      !empty($_POST['fName']) &&
      !empty($_POST['surname']) &&
      !empty($_POST['email']) &&
      !empty($_POST['password'])){
        $fname = $_POST['fName'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //$data = [$fname, $surname, $password, $email];
        $user = new User();
        $user->validateRegistration($fname, $surname, $password, $email);
    }else{
      echo "oh no, you R NOT REG";
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
  public function listOwnItems(){
      $userId = $_SESSION['userID'];
      $item = new Item();
      $data=$item->listOwnItems($userId);
      print_r($data);
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
    case 'listOwnItems':
      $controller->listOwnItems();
      break;
  }
}
?>
