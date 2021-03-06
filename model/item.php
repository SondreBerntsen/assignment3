<?php
require_once('Model.php');
class Item extends Model  {

	// this is the method for uploaded item without image
	public function newItem($values) {
		$db = $this->connectToDB();//stores databaseconnection i db variable

		$query = 'INSERT INTO item(name, descr, date, owner, category, previewtxt)
							VALUES (:name, :descr, NOW(), :owner, :category, :previewtxt)';
		$sth = $db->prepare($query);
		$sth->bindParam(':name', $values['name']);
		$sth->bindParam(':descr', $values['descr']);
		$sth->bindParam(':owner', $values['id']);
		$sth->bindParam(':category', $values['category']);
		$sth->bindParam(':previewtxt',$values['prev']);

		$sth->execute();
		$itemID = $db->lastInsertId();

		if($sth->rowCount() == 1){
			echo $itemID;
		}
		else{
			echo "false";
		}
	}
	//newItem is a function that creates a new item
	//It takes an array of all the values of the new item
	// this is the method for uploaded item containing image
	public function newItemWithImg($values){
		$db = $this->connectToDB();//stores databaseconnection i db variable

		$query = 'INSERT INTO item(name, descr, date, owner, category, previewtxt)
							VALUES (:name, :descr, NOW(), :owner, :category, :previewtxt)';
		$sth = $db->prepare($query);
		$sth->bindParam(':name', $values['name']);
		$sth->bindParam(':descr', $values['descr']);
		$sth->bindParam(':owner', $values['id']);
		$sth->bindParam(':category', $values['category']);
		$sth->bindParam(':previewtxt',$values['prev']);

		$sth->execute();
		$itemID = $db->lastInsertId();

		if($sth->rowCount() == 1){
			echo $itemID;
	    $outdir = '../storedImages/'.$itemID.'/'; // the directory to the videofile on disc
	    if (!is_dir($outdir)) // if it is not a directory...
	    {
	      mkdir($outdir, 0755, true); // create the directory
	    }
	    move_uploaded_file($values['ftmp'], $outdir.'image'); // move the tmp file to the directory named as 'videoFile'*/
		}else{
			echo "false";
		}
  }

	//getItemList is a function that returns a list of items
	public function getItemList($catName){
		$db = $this->connectToDB();//stores databaseconnection i db variable
		//If a category has not been chosen list the 5 most recent items
		if($catName=='none'){
			$query =
				'SELECT id, name, descr, date, previewtxt
				 FROM item
				 ORDER BY date DESC
				 LIMIT 5';
			$sth = $db->prepare($query);
			$sth->execute();
			$itemData = $sth->fetchAll(PDO::FETCH_ASSOC);

		}else{//Select items from the chosen category
			$query =
				'SELECT id, name, descr, date, previewtxt
				 FROM item
				 WHERE category = ?
				 ORDER BY date DESC';
			$sth = $db->prepare($query);
			$data = array($catName);
			$sth->execute($data);
			$itemData = $sth->fetchAll(PDO::FETCH_ASSOC);
		}
			echo json_encode($itemData);
	}
	//getItemData is a function that returns all data from a selected item
	public function getItemData($itemId){
		$db = $this->connectToDB();//stores databaseconnection i db variable
		$query = 'SELECT item.id, item.name, item.descr, item.date, user.firstName, user.lastName
							FROM item, user
							WHERE item.id=?
							AND item.owner = user.id';
		$sth = $db->prepare($query);
	 	$sth->execute(array($itemId));
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
	//deleteItem is a function that deletes a selected item
	public function deleteItem($itemId){
		$db = $this->connectToDB();//stores databaseconnection i db variable

		$query = 'DELETE FROM item WHERE id=?';
		$sth = $db->prepare($query);
		$sth->execute(array($itemId));
		$dir = '../storedImages'; // the directory to the folder of image
			// removes the image
			unlink($dir. '/' . $itemId . '/image'); // create the directory
			// removes the folder for the image
			rmdir($dir.'/'.$itemId);

	}
//Function that list all the items of the logged in user
//Takes the id of the logged in user as parameter
	public function listOwnItems($userID){
		$db = $this->connectToDB();//stores databaseconnection i db variable
		$query =
			'SELECT item.id as itemID, item.name, item.descr, item.date,  item.category, user.id as userID
			 FROM item, user
			 WHERE user.id = ?
			 AND item.owner = user.id';
		$sth = $db->prepare($query);
	 	$sth->execute(array($userID));
		$results = $sth->fetchAll(PDO::FETCH_ASSOC);
		$results['firstName'] = $_SESSION['firstName'];
		$results['lastName'] = $_SESSION['lastName'];
		$results['email'] = $_SESSION['email'];
		echo json_encode($results);
	}
}

?>
