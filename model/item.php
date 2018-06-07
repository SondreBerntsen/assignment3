<?php
require_once('Model.php');
class Item extends Model  {



	public function newItem($values){
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

		$this->itemID = $db->lastInsertId();

		return $this->itemID;


//
	/*	if($sth->rowCount() == 1){
			return "Things were inserted";
		}else{
			return "No workerino";
		}*/
  }


	//getItemList is a function that returns a list of items
	public function getItemList($catName){
		$db = $this->connectToDB();//stores databaseconnection i db variable
		//If a category has not been chosen list the 5 most recent items
		if($catName=='none'){
			$query = //ADD IMG WHEN RESUMING THE BALL
				'SELECT id, name, descr, date, previewtxt
				 FROM item
				 ORDER BY date DESC
				 LIMIT 5';
			$sth = $db->prepare($query);
			$sth->execute();
			$itemData = $sth->fetchAll(PDO::FETCH_ASSOC);

		}else{//Select items from the chosen category
			$query = //ADD IMG WHEN RESUMING THE BALL
				'SELECT id, name, descr, date, previewtxt
				 FROM item
				 WHERE category = ?
				 ORDER BY date DESC';
			$sth = $db->prepare($query);
			$data = array($catName);
			$sth->execute($data);
			$itemData = $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		/*
		for($i = 0; $i < count($itemData); $i++){
			if($itemData[$i]['img'] != null){
				$imgData = base64_encode($itemData[$i]['img']);
				unset($itemData[$i]['img']);
				$json = json_encode($itemData[$i]);


				echo $json;
				echo '|';
				echo $imgData;
			}else{
				echo json_encode($itemData);
			}
			*/
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
	}
	public function editItem(){

	}

	public function listOwnItems($userId){
		$db = $this->connectToDB();//stores databaseconnection i db variable
		$query = 'SELECT item.id, item.name, item.descr, item.date, item.category
							FROM item, user
							WHERE user.id=?
							AND item.owner = user.id';
		$sth = $db->prepare($query);
	 	$sth->execute(array($userId));
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
}

?>
