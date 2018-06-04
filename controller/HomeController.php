<?php

require_once('../model/Model.php');
require_once('../model/Category.php');
require_once('../model/Item.php');
require_once('Controller.php');

class HomeController extends Controller{

  public function listCategories(){
    $category = new Category();
    $category->listCategories();
  }
  public function getItem($category){
      $item = new Item();
      $item->getItemList($category);
    }
  }
$controller = new HomeController();
if(isset($_POST['action'])) {
  $action = $_POST['action'];

  switch($action) {
    case 'listCategories':
      $controller->listCategories();
      break;
    case 'listItems':
      $category = $_POST['category'];
      $controller->getItem($category);
      break;
  }
}


?>
