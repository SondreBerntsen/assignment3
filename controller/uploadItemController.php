<?php

require_once('../model/Model.php');
require_once('../model/Category.php');
require_once('Controller.php');


class uploadItemController extends Controller{
  public function getCategories(){
      $category = new Category();
      $category->listCategories();
    }
}


$uploadItemController = new uploadItemController ();

$uploadItemController -> getCategories();

/*if(isset($_POST['item'])) {
  $itemController->getItemData($_POST['item']);
}*/
