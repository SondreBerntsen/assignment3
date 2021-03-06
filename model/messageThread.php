<?php
require_once('Model.php');

class MessageThread extends Model{
	/*
	*checkExisting is a function that checks if the messagethread already exists
	*/
	public function checkExisting($itemID, $asker){
		$db = $this->connectToDB();//gets the database connection

		$query =
			'SELECT id
			 FROM messagethread
			 WHERE itemID = ?
			 AND asker = ?';
		$sth = $db->prepare($query);
		$sth->execute([$itemID, $asker]);
		$thread = $sth->fetch(PDO::FETCH_ASSOC);//Store thread id in $thread['id']

		if ($sth->rowCount() == 1){//if the thread already exists, retrun threadid
      echo $thread['id'];
    }else{//if the thread does noe exist return false
      echo 'false';
    }

	}
	//Function to create a new messagethread
	public function newThread($itemID, $askerID, $content){//Fix finn owner
		$db = $this->connectToDB();//Connection to database
		//Select the ownerID from itemId
		$query= 'SELECT owner
							FROM item
							WHERE id=?';

		$sth = $db->prepare($query);
	 	$sth->execute(array($itemID));
		$id = $sth->fetch(PDO::FETCH_ASSOC);//Store owner id in $id['owner']


		$query ='INSERT INTO messagethread (itemID, asker, owner)
			 				VALUES (?, ?, ?)';

		$sth = $db->prepare($query);
	  $sth->execute([$itemID, $askerID, $id['owner']]);
		if ($sth->rowCount() == 1){
    	$threadID = $db->lastInsertId(); //Gets threadId from the newly created messagethread
			$this->newMessage($content, $askerID, $threadID); //Creates a new message
    }else{
      echo 'false';
    }
	}
	//Function to create a new message that belongs to a spesific thread
	public function newMessage($content, $sender, $threadID){
			$db = $this->connectToDB();//Connection to database

			$query ='INSERT INTO message (content, date, sender,  threadID)
				 				VALUES (?, ?, ?, ?)';
			$sth = $db->prepare($query);
		  $sth->execute([$content, date('Y-m-d H:i:s'), $sender, $threadID]);
			//If the message was successfully put in the database return true
			if ($sth->rowCount() == 1){
	      echo $threadID;
	    }else{
	      echo 'false';
	    }
	}
	//Function to list all message threads the logged in user has been the owner
	public function listMessageThreadsOwner($userID){
		$db=$this->connectToDB();//Stores connection to database in $db

		$query= 'SELECT messagethread.id, item.name, user.firstName, user.lastName
							FROM messagethread, item, user
							WHERE messagethread.owner=?
							AND  user.id=messagethread.asker
							AND item.owner=?
							AND item.id=messagethread.itemID';

		$sth = $db->prepare($query);
	 	$sth->execute(array($userID, $userID));

		$results = $sth->fetchAll(PDO::FETCH_ASSOC);

		$json = json_encode($results);
		echo $json;
	}
	//Function to list all message threads the logged in user has been the asker
	public function listMessageThreadsAsker($userID){
		$db=$this->connectToDB();//Stores connection to database in $db

		$query= 'SELECT messagethread.id, item.name, user.firstName, user.lastName
							FROM messagethread, item, user
							WHERE messagethread.asker=?
							AND  user.id=messagethread.owner
							AND messagethread.itemID=item.id';

		$sth = $db->prepare($query);
	 	$sth->execute(array($userID));

		$results = $sth->fetchAll(PDO::FETCH_ASSOC);

		$json = json_encode($results);
		echo $json;
	}
	//listMessages function lists all messages that belongs to a spesific messagethread
	public function listMessages($threadID){
		$db = $this->connectToDB();

		$query =
			'SELECT message.id, message.content, message.date, user.firstName, message.sender
				FROM message, user
				WHERE threadID = ?
				AND user.id=message.sender
				ORDER BY date';
		$sth = $db->prepare($query);
	 	$sth->execute([$threadID]);

		$results = $sth->fetchAll(PDO::FETCH_ASSOC);
		$results['user'] = $_SESSION['userID'];
		$json = json_encode($results);
		echo $json;
	}

	public function deleteThread(){

	}
}

?>
