<?php

include_once("model/Category.php");

class Model {
	public function getCategoryList()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"category1" => new Category("category1", "user1"),
			"category2" => new Category("category2", "user2"),
			"category3" => new Category("category3", "user3")
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
