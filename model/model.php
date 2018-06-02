<?php

include_once("Category.php");
/*include_once("model/Item.php");
include_once("model/User.php");
include_once("model/MessageThread.php");
include_once("model/Message.php");*/

class Model {
	public function connectToDB(){
			 $dsn= 'mysql:dbname=secondhand;host=127.0.0.1';
			 $user = 'root';
			 $password = '';
			 $db = new PDO($dsn, $user, $password);
			 return $db;
	 }
	public function getCategoryList()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"category1" => new Category("category1"),
			"category2" => new Category("category2"),
			"category3" => new Category("category3")
		);
	}

	public function getCategory($title)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allCategories = $this->getCategoryList();
		return $allCategories[$title];
	}


}

?>
