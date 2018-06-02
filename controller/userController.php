<?php

require_once('../model/Model.php');
require_once('../model/User.php');
class UserController{

  public function newItem(){
    $name = $_POST['name']
    $descr = $_POST['descr']
    $img = $_POST['img']
    $category = $_POST['category']
    $previewText = $_POST['previewText']

    $returnArray = [$name, $descr, $img, $category, $previewText];
    User::newItem($returnArray);
  }
}
?>
