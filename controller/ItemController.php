<?php

require_once('../model/Model.php');
require_once('../model/Category.php');
require_once('../model/Item.php');
require_once('Controller.php');

class ItemController extends Controller{
  public function getItemData($itemData){
      $item = new Item();
      $item->getItemData($itemData);
    }
}

$itemController = new ItemController ();

if(isset($_POST['item'])) {

  $itemController->getItemData(2);
}