<?php
require_once('Model.php');
class Item extends Model  {


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
	public function getItem($catName){
		$db = $this->connectToDB();
		if($catName=='none'){
			$query = 'SELECT *
								FROM item
								ORDER BY date DESC
								LIMIT 5';

			$sth = $db->prepare($query);
			$sth->execute(array());
			$itemData=$sth->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($itemData);
		}else{
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
	public function getItemData($itemId){
		$db = $this->connectToDB();
		$query = 'SELECT item.id, item.name, item.descr, item.date, user.firstName, user.lastName
							FROM item, user
							WHERE item.id=?
							AND item.owner = user.id';
		$sth = $db->prepare($query);
	 	$sth->execute(array($itemId));
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
	public function deleteItem($itemId){
		$db = $this->connectToDB();

		$query = 'DELETE FROM item WHERE id=?';
		$sth = $db->prepare($query);
		$sth->execute(array($itemId));
	}
	public function editItem(){

	}
}

?>
