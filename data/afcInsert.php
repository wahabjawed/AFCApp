<?php
	
		header('Access-Control-Allow-Origin: *');
		include 'headers/connect_database.php';      // Connection to Mysql Database.
		//require_once('PHP/recaptchalib.php');   // Captcha Library.
		
		$type = $_POST['type'];
		
		
		//checking if username exists.
		
		
	$query = "select * from bayans WHERE sectionofbayan like '%$type%'";
			$result = mysqli_query($con,$query)
		
		
		
		
?>