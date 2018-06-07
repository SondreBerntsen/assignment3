<?php
require_once('../model/Model.php');
require_once('../model/Item.php');
require_once('../model/User.php');
require_once('Controller.php');

class uploadItemController extends Controller{

  public function uploadItem(){
  $user = new User();

  // storing the variables into the array
  $values = array(
    'name' => $_POST['name'], 'prev'=> $_POST['preview'],
    'descr'=> $_POST['descr'], 'ftmp' => $_FILES['imgfile']['tmp_name'],
    'category' => $_POST['category'], 'id'=>$_SESSION['userID']
  );
  // instance of the class Item
  $item = new Item();
  // fetches the lastInsertId from the method 'newItem'
  $itemID = $item->newItem($values);

  }
}

$uploadItem = new uploadItemController ();
$uploadItem -> uploadItem();
