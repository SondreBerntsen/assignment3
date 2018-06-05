<?php
require_once('Model.php');
class Item extends Model  {


	public function newItem($values){
		$db = $this->connectToDB();//stores database connection i db variable

		$query = 'INSERT INTO item(name, descr, img, date, owner, category, previewtxt)
							VALUES (?, ?, ?, NOW(), ?, ?, ?)';
		$sth = $db->prepare($query);
		$sth->execute([$values[0], $values[1], $values[2], $_SESSION['user'], $values[3], $values[4]]);
		$data=$sth->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($data);
		echo $json;

		if($sth->rowCount() == 1){
			return "Things were inserted";
		}else{
			return "No workerino";
		}
  }
	//getItemList is a function that returns a list of items
	public function getItemList($catName){
		$db = $this->connectToDB();//stores database connection i db variable
		//If a category has not been chosen list the 5 most recent items
		if($catName=='none'){
			$query = 'SELECT *
								FROM item
								ORDER BY date DESC
								LIMIT 5';

			$sth = $db->prepare($query);
			$sth->execute(array());
			$itemData=$sth->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($itemData);
		}else{//Select items from the chosen category
			$query = 'SELECT *
								FROM item
								WHERE category = ?
								ORDER BY date DESC';
			$sth = $db->prepare($query);
			$data = array($catName);
			$sth->execute($data);
			$itemData=$sth->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($itemData);
		}
	}
	//getItemData is a function that returns all data from a selected item
	public function getItemData($itemId){
		$db = $this->connectToDB();//stores database connection i db variable
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
		$db = $this->connectToDB();//stores database connection i db variable

		$query = 'DELETE FROM item WHERE id=?';
		$sth = $db->prepare($query);
		$sth->execute(array($itemId));
	}
	public function editItem(){

	}
}

?>
