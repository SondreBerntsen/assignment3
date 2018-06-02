<?php

require_once('model/Model.php');
require_once('model/Category.php');
require_once('model/Item.php');
require_once('Controller.php');

class HomeController extends Controller{

  public function listCategories(){
    $category = new Category();
    $category->listCategories();
  }
  public function listItems(){
    $item = new Item();
    $item->listItems();
  }

}

if(isset($_POST['action'])) {
  echo "things";
  $action = $_POST['action'];
  switch($action) {
    case 'testRonny':
      $controller = new HomeController();
      $controller->listCategories();
      break;
  }
}

?>
