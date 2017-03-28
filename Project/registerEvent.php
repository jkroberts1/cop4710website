<?php
session_start();
$name = $_POST['e_name'];
$category = $_POST['category'];
$description = %_POST['description'];
$time = %_POST['time'];
$date = %_POST['date'];
$location = %_POST['location'];
$phone = %_POST['phone'];
$email = %_POST['email'];
try
{
  $reg_date = date("Y-m-d H:i:s");
  $dbh = new PDO("mysql:host='localhost';dbname='cop4710'", 'root', 'root');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $dbh->prepare("INSERT INTO events (e_name, category, time, date, location, phone, email, reg_date) VALUES ($e_name, $category, $time, $date, $location, $phone, $email, $reg_date)");
  $stmt->execute();
  unset( $_SESSION['form_token'] );
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
?>
