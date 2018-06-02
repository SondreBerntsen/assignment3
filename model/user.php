<?php
require_once('Model.php');
class User extends Model{


	public function __construct(){

  }

	public function login(){

	}
  public function registerUser(){

  }
  public function changeUserData(){

  }
	public function newItem($values){
		$db = $this->connectToDB();

		$query = 'INSERT INTO item(name, descr, img, date, owner, category, previewtxt)
							VALUES (?, ?, ?, NOW(), ?, ?, ?)';
		$sth = $db->prepare($query);
		$sth->execute([$values[0], $values[1], $values[2], $_SESSION['user'], $values[3], $values[4]]);

		if($sth->rowCount() == 1){
			return "Things were inserted";
		}else{
			return "No workerino";
		}
  }

}
