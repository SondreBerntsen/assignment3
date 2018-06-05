<?php

require_once('../model/Model.php');
require_once('../model/Item.php');
require_once('Controller.php');



class uploadItemController extends Controller{

    public function uploadItem(){

      $values = array('name' => $_POST['name'], 'prev'=> $_POST['preview'],
      'descr'=> $_POST['descr'], 'ftmp' => $_FILES['imgfile']['tmp_name'], 'category' => $_POST['category'], 'id'=>2);
      print_r($values);

        $item = new Item();
        $item-> newItem($values);
      }
}


$uploadItem = new uploadItemController ();
$uploadItem -> uploadItem();
