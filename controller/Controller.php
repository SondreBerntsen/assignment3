<?php
require_once("../model/Model.php");
// this class gets extended by all the other controller classes
class Controller {
	public $model;

	public function __construct()
    {
				// new instance of Model
        $this->model = new Model();

    }


}

?>
