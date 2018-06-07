<?php
session_start();
require_once('Model.php');
class User extends Model{
	/*
	*checkLoginState function checks if the user is logged in or not
	*/
	public function checkLoginState(){
		$returnValue;

			if(isset($_SESSION['userID'])){
				$returnValue = 'true';
			}else{
				$returnValue = 'false';
			}

		echo $returnValue;
	}
/*
*Function that logs user in if username and password match
*/
	public function validateLogin($email, $password){
		$db = $this->connectToDB();

		$query =
			'SELECT *
			 FROM user
			 WHERE email = ?';

		$sth = $db->prepare($query);
	 	$sth->execute([$email]);
		if($result = $sth->fetch(PDO::FETCH_ASSOC)){
			  if (password_verify($password, $result['password'])){
					$_SESSION['userID'] = $result['id'];
					$_SESSION['name'] = $result['firstName'].' '.$result['lastName'];
					$_SESSION['email'] = $result['email'];
					$_SESSION['userType'] = $result['type'];
					echo 'true';
				}else{
					echo 'false';
				}
		}
	}
	public function validateRegistration($fname, $surname, $password, $email){
		$db = $this->connectToDB();

		$query =
			'SELECT email
			 FROM user
			 WHERE email = ?';

		$sth = $db->prepare($query);
	 	$sth->execute(array($email));
		$result = $sth->fetch(PDO::FETCH_ASSOC);

		if ($sth->rowCount() == 1){
			echo 'false';
    }else{
			$this->register($fname, $surname, $password, $email);
    }
	}

  public function register($fname, $surname, $password, $email){
		$db = $this->connectToDB();

		$query =
			"INSERT INTO user (firstName, lastName, email, password, type)
			 VALUES (?, ?, ?, ?, 'user')";

		$sth = $db->prepare($query);
		$sth->execute(array($fname, $surname, $email,
		password_hash($password, PASSWORD_DEFAULT)));

		echo 'true';
  }
	// this method updates the users name
  public function updateName($fname, $surname, $id){
		$db = $this->connectToDB();

		$query =
			'UPDATE user
			 SET firstName = ?, lastName = ?
			 WHERE id = ?';

		$sth = $db->prepare($query);
	 	$sth->execute([$fname, $surname, $id]);

		echo 'success';
  }

	// this method updates the user email
	public function updateEmail($email, $id){
		$db = $this->connectToDB();

		$query =
			'UPDATE user
			 SET email= ?
			 WHERE id = ?';

		$sth = $db->prepare($query);
		$sth->execute([$email, $id]);

		echo 'success';
	}

	// this method updates the user password
	public function updatePwd($pwd, $id){
		$db = $this->connectToDB();

		$query =
			'UPDATE user
			 SET password= ?
			 WHERE id = ?';

		$sth = $db->prepare($query);
		$sth->execute([password_hash($pwd, PASSWORD_DEFAULT), $id]);

		echo 'success';
	}
}
