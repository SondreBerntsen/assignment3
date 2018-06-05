<?php

class Model {
	public function connectToDB(){
			 $dsn= 'mysql:dbname=secondhand;host=127.0.0.1';
			 $user = 'root';
			 $password = '';
			 $db = new PDO($dsn, $user, $password);
			 return $db;
	 }

}

?>
