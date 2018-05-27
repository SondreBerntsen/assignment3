<?php

class Message {
	public $id;
	public $qAsker;
  public $owner;
  public $subject;

	public function __construct($id, $qAsker, $owner, $subject)
    {
      $this->id = $id;
	    $this->qAsker = $qAsker;
      $this->owner = $owner;
      $this->subject = $subject;
    }
}

?>
