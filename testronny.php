<html>
<head></head>

<body>

  <?php
  	include_once("controller/HomeController.php");

  	$controller = new HomeController();
  	$controller->listCategories();

  ?>

  <button class="btn" onclick="testRonny();">Add</button>
  <div id="loadDivRonny"></div>
  
<script src="js/main.js"></script>
</body>
</html>
