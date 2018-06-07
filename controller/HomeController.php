<?php
require_once('../model/Category.php');
require_once('../model/Item.php');
require_once('Controller.php');
/*
*HomeController class calls all functions related to the homepage
*/
class HomeController extends Controller{
  //Calls listcategories model function that echoes out a list of categories
  public function listCategories(){
    $category = new Category();
    $category->listCategories();
  }
  //Calls getItemlist model function that echoes out a list of items
  public function getItem($category){
      $item = new Item();
      $item->getItemList($category);
    }
  }
$controller = new HomeController();
if(isset($_POST['action'])) { //if $_POST['action'] is set
  $action = $_POST['action']; //Store the action in $action

  switch($action) {
    case 'listCategories':
      $controller->listCategories();  //Calls function that list categories in HomeController
      break;
    case 'listItems':
      $category = $_POST['category'];
      $controller->getItem($category);//Calls function that list items in HomeController
      break;
  }
}


?>
