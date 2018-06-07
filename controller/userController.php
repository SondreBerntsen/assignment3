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
    //$email = $_POST['email'];
    //$password = $_POST['password'];

    $user = new User();
    $user->validateLogin($_POST['email'], $_POST['password']);

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

  public function updateName(){
    // if neither of these input fields are empty..
    if(
      !empty($_POST['firstName']) &&
      !empty($_POST['lastName'])){
        $fname = $_POST['firstName'];
        $surname = $_POST['lastName'];
        $id = $_SESSION['userID'];
        $user = new User();
        $user->updateName($fname, $surname, $id);
    }
    else {
      echo "false";
    }
  }

  public function updateEmail(){
    // if this input fields are empty..
    if(
      !empty($_POST['email'])){
        $email = $_POST['email'];
        $id = $_SESSION['userID'];
        $user = new User();
        $user->updateEmail($email, $id);
    }
    else {
      echo "false";
    }
  }

  public function updatePwd(){
    // if this input fields are empty..
    if(
      !empty($_POST['pwd1']) &&
      !empty($_POST['pwd2']) &&
      $_POST['pwd1'] == $_POST['pwd2']){
        $pwd = $_POST['pwd1'];
        $id = $_SESSION['userID'];
        $user = new User();
        $user->updatePwd($pwd, $id);
    }
    else {
      echo "false";
    }
  }

  //method to call the inlogged students uploaded items
  public function listOwnItems(){
      $userId = $_SESSION['userID'];
      $item = new Item();
      $data=$item->listOwnItems($userId);
    }
  }

// if an action has been set..
if(isset($_POST['action'])) {

  $controller = new UserController();

  $action = $_POST['action'];
  // we go through actions..
  switch($action) {
    // and check the value of action
    case 'checkLoginState':
      // then we execute a method
      $controller->checkLoginState();
      break;
    case 'login':
      $controller->login();
      break;
    case 'register':
      $controller->register();
      break;
    case 'updateName':
      $controller->updateName();
      break;
    case 'updateEmail':
      $controller->updateEmail();
      break;
    case 'updatePwd':
      $controller->updatePwd();
      break;
    case 'listOwnItems':
      $controller->listOwnItems();
      break;
      /*
    case 'deleteListing':
      $controller->deleteListing();
      */
  }
}


?>
