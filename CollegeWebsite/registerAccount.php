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
    background-color: deepskyblue;
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
    background-color: aliceblue;
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
  <a href = "Homepage.html">Home</a><br>
  <a href = "newPetition.html">Create a Petition</a><br>
  <a href = "signPetition.html">Sign a Petition</a><br>
  <a href = "University.html">Lookup University</a><br>
  <a href = "eventLookup.html">Lookup Event</a><br>
<a href = "RSO.html">Lookup Organization</a><br>
  </p>
</nav>

<article>
	  
	<fieldset>
	<h1>Create Account</h1>
	<form id="createAccount" action="registerAccount.php" name="createAccount" method="post" >
	<p>Username: <input required type ="text" placeholder="username" id="username" name="username" size="15"
	maxlength="30" /> </p>
	<p>Password: <input required type ="password" placeholder="password" id="password"  name="password"size="15"
	maxlength="30" /> </p>
	
	<p><input type="submit" id="submit" value="Create Account" name="submit" /></p>
	</form>
	  <p>Have an account? <a href = "Homepage.html">Click Here</a> to Login. </p>
	  </fieldset> 
	  

</article>

<footer>Copyright &copy; COP4710DatbaseProject</footer>
   

</div>

</body>
</html>