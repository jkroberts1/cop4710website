<?php
session_start();
$name = $_POST['name'];
$location = $_POST['location'];
$description = $_POST['description'];
$numStudents = $_POST['numStudents'];

try
{
  $reg_date = date("Y-m-d H:i:s");
  $dbh = new PDO("mysql:host='localhost';dbname='cop4710'", 'root', 'root');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $dbh->prepare("INSERT INTO universty (name, location, description, numStudents, reg_date) VALUES (:name, :location, :description, :numStudents, :reg_date)");
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':location', $location, PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  $stmt->bindParam(':numStudents', $numStudents, PDO::PARAM_STR);
  $stmt->bindParam(':reg_date', $reg_date, PDO::PARAM_STR);
  $stmt->execute();
  unset( $_SESSION['form_token'] );
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
?>
