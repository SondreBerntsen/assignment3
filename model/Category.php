<?php
// Class for Category
require_once('model/model.php');
class Category extends Model {


//createCategory function creates a new category
	public function createCategory($name){
		$db = $this->connectToDB();
		$query = 'INSERT INTO category (name) VALUES (?)';
    $sth = $db->prepare($query);
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
    $sth = $db->prepare($query);
    $sth->execute(array($name));
	}

	public function listCategories(){
		$db = $this->connectToDB();
		$query = 'SELECT name
              FROM category
              ORDER BY name DESC';
    $sth = $db->prepare($query);
    $sth->execute(array());
    $data=$sth->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);
	}

}

?>
