<?php

include('model/Model.php');
include('model/Category.php');
include('model/Item.php');
class indexController extends Controller{

  public function listCategories(){
    $category = new Category();
    $category->listCategories();
  }
  public function listItems(){
    $item = new Item();
    $item->listItems();
  }

}
?>
