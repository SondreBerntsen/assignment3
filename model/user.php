<?php
require_once('Model.php');
class User extends Model{

	public function checkLoginState(){
			if(isset($_SESSION['userID'])){
				echo 'true';
				die;
			}else{
				echo 'false';
			}
	}

	public function validateLogin($data){
		$db = $this->connectToDB();

		$query =
			'SELECT *
			 FROM user
			 WHERE email = ?
			 AND password = ?';

		$sth = $db->prepare($query);
	 	$sth->execute($data);
		$result = $sth->fetch(PDO::FETCH_ASSOC);

		if (count($result) == 1){
			$data = [
				$result['id'],
				$result['firstName'],
				$result['lastName'],
				$result['email'],
				$result['type']
			];
      $this->login($data);
    }else{
     	echo 'User not found';
    }
	}

	public function validateRegistration($data){
		$db = $this->connectToDB();

		$query =
			'SELECT email
			 FROM user
			 WHERE email = ?';

		$sth = $db->prepare($query);
	 	$sth->execute($data[2]);
		$result = $sth->fetch(PDO::FETCH_ASSOC);

		if (count($result) == 1){
			echo 'That email is already in use';
    }else{
			$this->register($data);
    }
	}

	public function login($data){
		$_SESSION['userID'] = $data[0];
		$_SESSION['name'] = $data[1].' '.$data[2];
		$_SESSION['email'] = $data[3];
		$_SESSION['userType'] = $data[4];

		echo 'success';
		// window.location.href = 'index.php' in ajax callback
	}
  public function register($data){
		$db = $this->connectToDB();

		$query =
			'INSERT INTO user (firstName, lastName, email, password, type)
			 VALUES (?, ?, ?, ?, 'user')';

		$sth = $db->prepare($query);
		$sth->execute($data);

		echo 'success';
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

		$SESSION['name'] = $data[0];
		$SESSION['email'] = $data[1];

		echo 'success';
		// maybe window.location.href = 'userDashboard.php' or whatever in ajax callback, where the updated information should be listed by some function which checks session vars.
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
