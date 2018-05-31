<?php
// Class for Category
include('model/model.php');
class Category extends Model {

	$db = $this->connectToDB();
//createCategory function creates a new category
	public function createCategory($name){
		$query = 'INSERT INTO category (name) VALUES (?)';
    $sth = $this->db->prepare($query);
    $data = array($name);
   $sth->execute($data);
   //If there is a new row in a database retrun true
   if ($sth->rowCount() == 1){
     return true;
   }else{//return false, could not insert category in db
     return false;
   }
	}
	public function delteCategory($name){
		$db = $this->connectToDB();

		$query = 'DELETE FROM category WHERE name=?';
    $sth = $this->db->prepare($query);
    $sth->execute(array($name));
	}
}

?>
