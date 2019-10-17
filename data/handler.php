<?php
	try {
		$handler = new PDO('mysql:host=localhost;dbname=db_ciapayments','root','');
		//$handler = new PDO('mysql:host=localhost;dbname=db_ciapayments','root','');
		$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();	
	}
?>