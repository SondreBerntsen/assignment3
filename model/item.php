<?php
require_once('Model.php');
class Item extends Model  {


	public function newItem($values){
		$db = $this->connectToDB();//stores databaseconnection i db variable

		$query = 'INSERT INTO item(name, descr, img, date, owner, category, previewtxt)
							VALUES (:name, :descr, :img, NOW(), :owner, :category, :previewtxt)';
		$sth = $db->prepare($query);
		$sth->bindParam(':name', $values['name']);
		$sth->bindParam(':descr', $values['descr']);
		$sth->bindParam(':owner', $values['id']);
		$sth->bindParam(':category', $values['category']);
		$sth->bindParam(':previewtxt',$values['prev']);

		$img = file_get_contents($values['ftmp']);
		$scaledContent = $this->scale(imagecreatefromstring($img) , 200, 200);
		unset($img);
		$sth->bindParam(':img', $scaledContent);
		$sth->execute();


			// fix feedback
	/*	if($sth->rowCount() == 1){
			return "Things were inserted";
		}else{
			return "No workerino";
		}*/
  }

	//Method that scales image
	public function scale($img, $new_width, $new_height){
			$old_x = imageSX($img);
			$old_y = imageSY($img);

			if ($old_x > $old_y){ // Image is landscape mode
					$thumb_w = $new_width;
					$thumb_h = $old_y * ($new_height / $old_x);
			}
			else if ($old_x < $old_y){ // Image is portrait mode
					$thumb_w = $old_x * ($new_width / $old_y);
					$thumb_h = $new_height;
			}if ($old_x == $old_y)
			{ // Image is square
					$thumb_w = $new_width;
					$thumb_h = $new_height;
			}
			 // Don't scale images up
			if ($thumb_w > $old_x){
					$thumb_w = $old_x;
					$thumb_h = $old_y;
			}
			$dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
			imagecopyresampled($dst_img, $img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);

			ob_start(); // flush/start buffer
			imagepng($dst_img, NULL, 9); // Write image to buffer
			$scaledImage = ob_get_contents(); // Get contents of buffer
			ob_end_clean(); // Clear buffer

			return $scaledImage;
	}
	//getItemList is a function that returns a list of items
	public function getItemList($catName){
		$db = $this->connectToDB();//stores databaseconnection i db variable
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
}

?>
