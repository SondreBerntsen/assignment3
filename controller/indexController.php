<?php

include('model/model.php');
include('model/category.php');
class indexController{

  public function listCategories(){
    Category::listCategories();
  }
  public function listItems(){
    Item::listItems();
  }

}
?>
