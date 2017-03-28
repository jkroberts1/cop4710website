<?php

			session_start(); // Right at the top of your script

			$hn = 'localhost';
			$db = 'events';
			$un = 'root';
			$pw = '';
			
			$first = $_REQUEST['FirstName'];
			$last = $_REQUEST['LastName'];
			$pass = $_REQUEST['Password'];
			$passV = $_REQUEST['PasswordV'];
			$user = $_REQUEST['Username'];
			
			$link = mysql_connect($hn, $un, $pw);
			
			if (!$link){
				die('Could not coonect: ' . mysql_error());
			}
		
			$db_selected = mysql_select_db($db, $link);
			
			if (!$db_selected){
				die('Can\'t use ' . $db . ': ' . mysql_error());
			}
			
			$sql = "INSERT INTO `students`(`FirstName`, `LastName`, `Username`, `Password`) VALUES (('$first'), ('$last'), ('$user'), ('$pass'))";
			mysql_query($sql, $link);
			$sql = "INSERT INTO `users`(`username`, `password`) VALUES (('$user'), ('$pass'))";
			mysql_query($sql, $link);
			
			
			header("Location: Homepage.html");
			
?>