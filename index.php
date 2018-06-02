<?php
	include_once("controller/HomeController.php");
	include_once("includes/header.inc.php");

	$controller = new HomeController();
	$controller->listCategories();

	include_once("includes/footer.inc.php");

?>
