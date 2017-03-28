<?php

			session_start(); // Right at the top of your script

			$hn = 'localhost';
			$db = 'events';
			$un = 'root';
			$pw = '';
			
			$user = $_REQUEST['username'];
			$pass = $_REQUEST['password'];
			
			$link = mysql_connect($hn, $un, $pw);
			
			if (!$link){
				die('Could not connect: ' . mysql_error());
			}
		
			$db_selected = mysql_select_db($db, $link);
		
			$value = $_POST['username'];
			$value2 = $_POST['password'];
			
			if (!$db_selected){
				die('Can\'t use ' . $db . ': ' . mysql_error());
			}
			
			$sql = "SELECT * FROM users U WHERE U.username = ('$value') AND U.password = ('$value2')";
		
			if (!mysql_query($sql)){
				
				die('Error: ' . mysql_error());
			}
			
			$result = mysql_query($sql, $link);
			if(!$result || mysql_num_rows($result) <= 0)
			{
				$_SESSION['logged']=false;
				header("Location: Homepage.html");
			}else{
				
				 $_SESSION['logged']=true;
				 $_SESSION['username']=$value;
				 
				 if($value == 'super'){
					 
					 header("Location: Super.html");
					 
				 }else{
				 
					 header("Location: Homepage.html");
					 exit();
				 }
			}
			
			
?>