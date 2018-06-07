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
    //$item-> newItem($values);
    $itemID = $item->newItemWithImg($values); // fetches the lastInsertId from the method
  }

  public function uploadItem() {
    $values = array('name' => $_POST['name'], 'prev'=> $_POST['preview'],
    'descr'=> $_POST['descr'],  'category' => $_POST['category'], 'id'=>$_SESSION['userID']);
    
    $item = new Item();
    $itemID = $item->newItem($values); // fetches the lastInsertId from the method
  }

  public function getCategories(){
    $category = new Category();
    $category->listCategories();
  }
}

$controller = new uploadItemController ();
if(isset($_POST['action'])) {
  $action = $_POST['action'];

  switch($action) {
    case 'listCategories':
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
