<?php
session_start();
require_once('../model/Item.php');
require_once('../model/Category.php');
require_once('Controller.php');

class uploadItemController extends Controller{

  public function uploadItemWithImg(){
    $values = array('name' => $_POST['name'], 'prev'=> $_POST['preview'],
    'descr'=> $_POST['descr'], 'ftmp' => $_FILES['imgfile']['tmp_name'],  'category' => $_POST['category'], 'id'=>$_SESSION['userID']);

    $item = new Item();
    // fetches the lastInsertId from the method
    $itemID = $item->newItemWithImg($values);
  }

  public function uploadItem() {
    $values = array('name' => $_POST['name'], 'prev'=> $_POST['preview'],
    'descr'=> $_POST['descr'],  'category' => $_POST['category'], 'id'=>$_SESSION['userID']);

    $item = new Item();
    // fetches the lastInsertId from the method nweItem in the Item class
    $itemID = $item->newItem($values);
  }

  public function getCategories(){
    $category = new Category();
    $category->listCategories();
  }
}

$controller = new uploadItemController ();
// if action is set..
if(isset($_POST['action'])) {
  $action = $_POST['action'];
  // .. go through all the actions..
  switch($action) {
    // ..until it finds the value..
    case 'listCategories':
      // ..the redirects to a method
      $controller->getCategories();
      break;
    case 'uploadItem':
      $controller->uploadItem();
      break;
    case 'uploadItemWithImg':
      $controller->uploadItemWithImg();
      break;
  }
}
