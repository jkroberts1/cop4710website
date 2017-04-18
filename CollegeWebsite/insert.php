<?php

        $connect = mysqli_connect("localhost", "root", "", "cop4710");
    	if(!$connect){
    		echo "Error in DB" . die(mysqli_error());
    	}
        
        $Organization = $_POST['org'];

        $sql = "INSERT INTO petition (Organization) VALUES ('p_name')";

        if(!mysqli_query($connect, $sql))
        {
            ech "Not in DB";
        }
       
        header("refresh:2; url=newPetition.php");
?>