<?php
header('Content-type: image/jpeg');
require_once('../model/MessageThread.php');
require_once('../model/Item.php');
require_once('Controller.php');

class ItemController extends Controller{

  public function getItemData($itemData){
    $item = new Item();
    $item->getItemData($itemData);
  }

  public function checkExistingThread($itemID){
    $asker = $_SESSION['userID'];
    $messageThread = new MessageThread();
    $messageThread->checkExisting($itemID, $asker);
  }

  public function newMsgThread($itemID, $content){
    $asker = $_SESSION['userID'];
    $messageThread = new MessageThread();
    $messageThread->newThread($itemID, $asker, $content); // Target function currently takes three params, but it has to check for owner itself
  }

}

$itemController = new ItemController ();

if(isset($_POST['action'])){
  $action = $_POST['action'];

  switch($action){
    case 'getItemData':
      $itemController->getItemData($_POST['item']);

      break;
    case 'checkExistingThread':
      $itemController->checkExistingThread($_POST['item']);
      break;
    case 'newMsgThread':
      $itemController->newMsgThread($_POST['item']);
      break;
  }

}
