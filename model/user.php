<?php
session_start();
require_once('Model.php');
class User extends Model{

	public function checkLoginState(){
		$returnValue;

			if(isset($_SESSION['userID'])){
				$returnValue = 'true';
			}else{
				$returnValue = 'false';
			}

		echo $returnValue;
	}

	public function validateLogin($email, $password){
		$db = $this->connectToDB();

		$query =
			'SELECT *
			 FROM user
			 WHERE email = ?
			 AND password = ?';

		$sth = $db->prepare($query);
	 	$sth->execute([$email, $password]);
		$result = $sth->fetch(PDO::FETCH_ASSOC);

		if ($sth->rowCount() == 1){
			$_SESSION['userID'] = $result['id'];
			$_SESSION['name'] = $result['firstName'].' '.$result['lastName'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['userType'] = $result['type'];
			echo 'true';
    }else{
     	echo 'false';
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
		// window.location.href = 'index.php' in ajax callback
  }

  public function update($data){
		$db = $this->connectToDB();
		// I decided not to let them change email because it complicates the funcion =( If you want them to be able to change email, we need a select statement to check if the email is taken or not before running the rest of the function.

		$query =
			'UPDATE user
			 SET firstName = ?, lastName = ?, password = ?
			 WHERE id = ?';

	  $execute = [$data[0], $data[1], $data[2], $_SESSION['id']];
		$sth = $db->prepare($query);
	 	$sth->execute($execute);

		//TIng her
		$SESSION['name'] = $data[0];
		$SESSION['email'] = $data[1];

		echo 'success';
		// maybe window.location.href = 'userDashboard.php' or whatever in ajax callback, where the updated information should be listed by some function which checks session vars.
  }


}
