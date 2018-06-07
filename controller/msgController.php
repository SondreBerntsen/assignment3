<?php
session_start();
require_once('../model/MessageThread.php');
require_once('../model/Item.php');
require_once('Controller.php');

class MsgController extends Controller{

  public function listMessageThreadsOwner($userID){
    $messageThread = new MessageThread();
    $messageThread->listMessageThreadsOwner($userID);
  }
  public function listMessageThreadsAsker($userID){
    $messageThread = new MessageThread();
    $messageThread->listMessageThreadsAsker($userID);
  }
  public function listMessages($threadID){
    $messageThread = new MessageThread();
    $messageThread->listMessages($threadID);
  }
}
$msgController = new MsgController ();

if(isset($_POST['action'])){
  $action = $_POST['action'];

  switch($action){
    case 'getMyItems':
      $msgController->listMessageThreadsOwner($_SESSION['userID']);
      break;
    case 'getOther':
      $msgController->listMessageThreadsAsker($_SESSION['userID']);
      break;
    case 'listMessages':
      $msgController->listMessages($_POST['threadID']);
  }

}
