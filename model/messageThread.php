<?php
require_once('Model.php');

class MessageThread extends Model{

	public function checkExisting($itemID, $asker){
		$db = $this->connectToDB();

		$query =
			'SELECT id
			 FROM messagethread
			 WHERE itemID = ?
			 AND asker = ?';
		$sth = $db->prepare($query);
		$sth->execute([$itemID, $asker]);

		if ($sth->rowCount() == 1){
      echo 'true';
    }else{
      echo 'false';
    }

	}

	public function newThread($itemID, $askerID, $ownerID){
		$db = $this->connectToDB();

		$query =
			'INSERT INTO messagethread (itemID, asker, owner)
			 VALUES (?, ?, ?)';

		$sth = $db->prepare($query);
	  $sth->execute([$itemID, $asker, $owner]);

		if ($sth->rowCount() == 1){
			$threadID = $sth->fetch(PDO::FETCH_ASSOC);
      echo $threadID;
    }else{
      echo 'false';
    }

	}
	public function listMessages($threadID){
		$db = $this->connectToDB();

		$query =
			'SELECT *
			 FROM message
			 WHERE threadID = ?';
		$sth = $db->prepare($query);
	 	$sth->execute([$threadID]);

		$results = $sth->fetchAll(PDO::FETCH_ASSOC);

		$json = json_encode($results);
		print_r($json);
	}

	public function deleteThread(){

	}



}

?>
