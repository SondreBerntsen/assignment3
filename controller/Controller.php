<?php
include_once("model/Model.php");

class Controller {
	public $model;

	public function __construct()
    {
        $this->model = new Model();

    }

	public function invoke()
	{
		if (!isset($_GET['category']))
		{
			// no special book is requested, we'll show a list of all available books
			$categories = $this->model->getCategoryList();
			include 'view/categorylist.php';
		}
		else
		{
			// show the requested book
			$category = $this->model->getCategory($_GET['category']);
			include 'view/viewcategory.php';
		}
	}

}

?>
