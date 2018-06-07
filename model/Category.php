<?php
// Class for Category
require_once('Model.php');
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
	/*
	*deleteCategory function gets catecoryname as parameter and deletes it
	*/
	public function deleteCategory($name){
		$db = $this->connectToDB();//Gets the connection to database

		$query = 'DELETE FROM category WHERE name=?';
    $sth = $db->prepare($query);
    $sth->execute(array($name));
	}
//Function to list all the categories
	public function listCategories(){
		$db = $this->connectToDB();//connection to database
		$query = 'SELECT name
              FROM category
              ORDER BY name DESC';
    $sth = $db->prepare($query);
    $sth->execute();
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($data);
		echo $json;
	}

}

?>
