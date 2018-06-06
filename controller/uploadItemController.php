<?php
session_start();
require_once('../model/Model.php');
require_once('../model/Item.php');
require_once('../model/User.php');
require_once('Controller.php');




class uploadItemController extends Controller{

    public function uploadItem(){
      $user = new User();

  if( !isset($_FILES['imgfile']) ) {
    echo "imgfile does not exist";

    $values = array('name' => $_POST['name'], 'prev'=> $_POST['preview'],
    'descr'=> $_POST['descr'], 'category' => $_POST['category'], 'id'=>$_SESSION['userID']);
    print_r($values);

    $item = new Item();
    $item-> newItemtest($values);



  }
  else {

    echo "fil er blitt lagt med";

   $values = array('name' => $_POST['name'], 'prev'=> $_POST['preview'],
    'descr'=> $_POST['descr'], 'ftmp' => $_FILES['imgfile']['tmp_name'],  'category' => $_POST['category'], 'id'=>$_SESSION['userID']);
    print_r($values);


    $item = new Item();
    $item-> newItem($values);
    $itemID = $item->newItem($values); // fetches the lastInsertId from the method 'uploadVideo'
    echo $itemID;
    $outdir = '../storedImages/'.$itemID.'/'; // the directory to the videofile on disc
    if (!is_dir($outdir)) // if it is not a directory...
    {
      mkdir($outdir, 0755, true); // create the directory
    }
    move_uploaded_file($values['ftmp'], $outdir.'image'); // move the tmp file to the directory named as 'videoFile'*/

    }
  }
}


$uploadItem = new uploadItemController ();
$uploadItem -> uploadItem();


/*$outdir = '../../fileStorage/uploadedVideos/'.$userId.'/'.$videoId.'/'; // the directory to the videofile on disc

if (!is_dir($outdir)) // if it is not a directory...
{
  mkdir($outdir, 0755, true); // create the directory
}

move_uploaded_file($_FILES['videofile']['tmp_name'], $outdir.'videoFile'); // move the tmp file to the directory named as 'videoFile'*/
