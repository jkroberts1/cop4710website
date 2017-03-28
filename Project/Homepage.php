<!DOCTYPE html>
<?php
	require_once 'login.php';
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);
	echo <<<_END
		<html>
		<head>
		<style>
		div.container {
			width: 100%;
			border: 1px solid gray;
		}

		footer {
			padding: 1em;
			color: white;
			background-color: black;
			clear: left;
			text-align: center;
		}

		header {
			color: white;
			background-color: gold;
			text-align: center;
			overflow: hidden;
		}

		navheader {
			float: left;
			max-width: 160px;
			margin: 0;
			max-height: 160px;
		}

		nav {
			float: left;
			max-width: 160px;
			margin: 0;
			padding: 1em;
		}

		nav ul {
			list-style-type: none;
			padding: 0;
		}
		   
		nav ul a {
			text-decoration: none;
		}

		article {
			margin-left: 170px;
			border-left: 1px solid gray;
			padding: 1em;
			overflow: hidden;
		}
		</style>
		</head>
		<body>

		<div class="container">




		<header>
			<navheader>
		  <img src="Logo.jpeg" alt="Mountain View" style="width:170px;height:160px;">
		</navheader>
			<h1 align="center"><br /> Database Assignment </h1>
		</header>
		  
		<nav>
		  <p>
		  Home
		  </p>
		</nav>

		<article>
		  <h1>Sign In</h1>
		  <p>Username:
		  <input type ="text" name="username" size"15
		  maxlength="30" /></p>
		  <p>
		  Password:
		  <input type ="password" name="password" size"15
		  maxlength="30" />
		  </p>
		  <button type = "button">Sign In</button>
		  <p>
		  <a href = "CreateAccount.html">Click Here</a> to Create Account
		  </p>
		  
		</article>

		<footer>Copyright &copy; COP4710DatbaseProject</footer>

		</div>

		</body>
	</html>
_END;
?>