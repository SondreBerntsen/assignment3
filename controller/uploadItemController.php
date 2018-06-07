<?php
require_once('../model/Model.php');
require_once('../model/Item.php');
require_once('../model/User.php');
require_once('Controller.php');




class uploadItemController extends Controller{

    public function uploadItem(){
      $user = new User();


   $values = array('name' => $_POST['name'], 'prev'=> $_POST['preview'],
    'descr'=> $_POST['descr'], 'ftmp' => $_FILES['imgfile']['tmp_name'],  'category' => $_POST['category'], 'id'=>$_SESSION['userID']);
    print_r($values);


    $item = new Item();
    //$item-> newItem($values);
    $itemID = $item->newItem($values); // fetches the lastInsertId from the method 'uploadVideo'

    }
  }



$uploadItem = new uploadItemController ();
$uploadItem -> uploadItem();
