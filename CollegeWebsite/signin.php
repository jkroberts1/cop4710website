<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
}
thing{
    float: right;
    width: 82px;
    text-align: left;
    color: white;
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
    color: aliceblue;
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
  <a href = "newPetition.php">Create a Petition</a><br>
  <a href = "findPetition.php">Find a Petition</a><br>
  <a href = "University.php">Lookup University</a><br>
  <a href = "eventLookup.php">Lookup Event</a><br>
  <a href = "RSO.php">Lookup Organization</a><br>
  </p>
</nav>

<article>
	<thing>.</thing>
	<fieldset>
	<?php
        
class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
         parent::__construct($it, self::LEAVES_ONLY);
     }
     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }
     function beginChildren() {
         echo "<tr>";
     }
     function endChildren() {
         echo "</tr>" . "\n";
     }
}
  
  $username = $_POST['username'];
  $password = $_POST['psw'];
        
        //$password = sha1($_POST['psw']);
        
        $servername = "localhost";
        $name = "root";
        $pass = "";
        
        
     try {
         $dbh = new PDO("mysql:host=$servername;dbname=cop4710", $name, $pass);
         
         $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             echo "Connected to database successfully";
         
           $stmt = $dbh->prepare ("SELECT psw FROM students WHERE username = :username") ;
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        
        $stmt->execute();
        
  $result =  $stmt->setFetchMode (PDO::FETCH_ASSOC);  //$dbh->query($stmt);
            
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        if (strip_tags($v) === $password) {
        $_SESSION["username"] = $username;
	 $_SESSION['logged'] = true;
         echo "<br> Login Successful <br>";
        }
        else {
            
            echo "Login Unsuccessful";
            /*echo strcmp ($v, $password);
            
            echo "Incorrect Password              ";
            echo $k ;
            echo "                 pass      ";
                echo $password;
            
            
            
              echo "coup_amount: (strip_tags($v))  zero_amount: ($password) \n";
  echo "coup_len:".strlen(strip_tags($v))." zero_len:".strlen($password)."\n";
  echo "strcmp: ".strcmp(strip_tags($v), $password)."\n";
  echo "coup_ascii: ".ord($k[0])." zero_ascii:".ord($password[0]);
            */
        }
         
     }
         
         
         
        }
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
  
      /* if($password == $row["psw"])
       {
           $_SESSION["username"] = $username;
	 $_SESSION['logged'] = true;
         echo "<br> Login Successful <br>";
     }   */
        
        
  
  ?>  
	</fieldset> 
	  

</article>

<footer>Copyright &copy; COP4710DatbaseProject</footer>
   

</div>

</body>
</html>
