<?php

class Item {
	public $id;
	public $owner;
	public $description;
  public $date;

	public function __construct($id, $owner, $description, $date)
    {
      $this->id = $id;
	    $this->owner = $owner;
	    $this->description = $description;
      $this->date = //NOW();
    }

	public function whateverYouWant(){

	}
}

?>
