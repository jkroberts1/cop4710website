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
	font-family: 'Averia Serif Libre';
	font-size: 40px;
	vertical-align: middle;
}
.format1 {
	color: black;
	font-size: 24px;
}
#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 90%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}
#PetitionTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}
#PetitionTable th, #PetitionTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
}
#PetitionTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
}
#PetitionTable tr.header, #PetitionTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
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
	  session_start();
  
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
<header align="center">
<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
 <h1 class="format"><br /> College Events </h1>
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

<article align = "center">
	  
	  <fieldset class="format1">
	  
		  Find a Petition<br></br>
      	
      	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table id="PetitionTable">
  <tr class="header">
    <th style="width:40%;">Student Organization</th>
    <th style="width:30%;">Creator</th>
    <th style="width:30%;">University</th>
  </tr>
    <?php
    	$connect = mysqli_connect("localhost", "root", "", "cop4710");
    	if(!$connect){
    		echo "Error in DB" . die(mysqli_error());
    	}
        $sql = "SELECT * FROM petition";
        $result = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($result))
    	{
    	?>
			<tr>
				<td><?php echo $row["p_name"]?></td>
				<td><?php echo $row["username"]?></td>
                <td><?php echo $row["u_name"]?></td>
			</tr>
    <?php
   		}
    ?>
</table>
      	
      	
	  </fieldset> 
	  

</article>

<footer>Copyright &copy; COP4710DatbaseProject</footer>
   

</div>
<script>
	function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("PetitionTable");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}	  
</script>
      
</body>
</html>