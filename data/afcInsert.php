<?php
	
		header('Access-Control-Allow-Origin: *');
		include 'connect_to_mysql.php';      // Connection to Mysql Database.
		//require_once('PHP/recaptchalib.php');   // Captcha Library.
		
		$emailID = $_POST['emailID'];
		
		
		//checking if username exists.
		
		
		$query = "SELECT count(*) from emailList WHERE emailID=:emailID";
		$sth = $dbh->prepare($query);
		$sth->bindValue(':emailID',$emailID);
		$sth->execute();
		$rows = $sth->fetch(PDO::FETCH_NUM);
		
		
		// this condition checks if count(*) is 0 that means if username doesnot exist
		
		if($rows[0] == 0)  
		{
			
			// inserting user details if username doesnot exist
			
			$query = "INSERT INTO emailList(emailID) VALUES (:emailID)";
			$sth = $dbh->prepare($query);
			$sth->bindValue(':emailID',$emailID);
			//$sth ->execute();
			 if($sth ->execute())
			 { 
		echo "Registered On the NewsLetter List SuccessFully";
				}
			  
			 else 
			 {	
				$errorCode = $sth->errorCode();
				echo "ErrorCode: " . $errorCode; 
			  }
			
			
		} // Ending bracket of IF($rows[0]==0)
		
		else
		{
			echo "You are already registered";
		}
		
		
		$dbh = null;   // setting the database connection to null
		
		
?>