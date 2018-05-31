<?php
include('model/model.php');
class User extends Model{


	public function __construct(){

  }

	public function login(){

	}
  public function registerUser(){

  }
  public function changeUserData(){

  }
	public function newItem(){
		$db = $this->connectToDB();


		$query = 'INSERT INTO item
							VALUES ()';
		$sth = $db->prepare($query);
		$sth->execute();
  }

}
