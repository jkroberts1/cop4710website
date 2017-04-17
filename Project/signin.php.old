<?php session_start(); ?>
<!DOCTYPE html>
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
	height: 140px;
	left: 170px;
	border-left: 1px solid gray;
	border-right: 1px solid gray;
	border-bottom: 1px solid gray;
}
navheader {
    float: left;
    max-width: 170px;
    margin: 0;
    max-height: 140px;
	
}
header-right {
	float: right;
	width: 100px;
	text-align: left;
	border-bottom: 1px solid gray;
	height: 140px;
	
}
nav {
    float: left;
	top: 140px;
    max-width: 170px;
	max-height: 150px;
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
	top: 140px;
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
.format {
	color: black;
	font-family: 'Sofia';
	font-size: 40px;
	vertical-align: middle;
}
</style>
</head>
<body>

<div class="container">

<navheader>
  <img src="Logo.jpeg" alt="Mountain View" style="width:170px;height:140px;">
</navheader>
<header-right>
	
	<?php	session_start(); ?>

	  <?php 
	  if(isset($_SESSION['logged'])){
	  if($_SESSION['logged']==true)
		{ 
		  echo "<p>Welcome:</p>";	
		  echo $_SESSION["username"];
		  echo "<br>";
		  echo '<a href="logout.php"><span>Logout</span></a></li>';
		}
	  elseif($_SESSION['logged']==false)
		{
		  echo "<p>Please Sign in </p>";
		  echo '<a href="Homepage.html"><span>Login/Register</span></a></li>';
		}
		}else{
			echo "<p>Please sign in below. </p>";
		}
	  ?>
	
</header-right>
<header>
<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
 <h1 class="format" align="center"><br /> College Events </h1>
</header>

<nav>
  <p>
  Home
  </p>
</nav>

<article>
	  
	<fieldset>
	<?php
  
  $username = $_POST['username'];
  $password = sha1($_POST['psw']);
  
  $dbh = new PDO("mysql:host='localhost';dbname='cop4710'", 'root', 'root');
  if ($dbh->connect_error)
  {
    die("Connection failed: " . $dbh->connect_error);
  } 

  $stmt = "SELECT psw FROM students WHERE user = $row["$username"]";
  $result = $dbh->query($stmt);

  if ($result->num_rows > 0)
  {
     while($row = $result->fetch_assoc())
     {
       if($password == $row["psw"])
       {
         $_SESSION["username"] = $username;
	 $_SESSION['logged'] = true
         echo "<br> Login Successful <br>";
     }
  }
  else 
  {
     echo "Password Incorrect";
  }

  $conn->close();
  ?>  
	<p>Don't have an account? <a href = "registerAccount.html">Click Here</a> to Register.</p>
	</fieldset> 
	  

</article>

<footer>Copyright &copy; COP4710DatbaseProject</footer>
   

</div>

</body>
</html>
