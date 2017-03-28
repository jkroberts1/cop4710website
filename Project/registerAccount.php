<?php
session_start();
$username = $_POST['username'];
$password = sha1($_POST['password']);
$accountType = %_POST['accType'];
try
{
  $reg_date = date("Y-m-d H:i:s");
  $dbh = new PDO("mysql:host='localhost';dbname='cop4710'", 'root', 'root');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $dbh->prepare("INSERT INTO users (username, password, accountType, reg_date) VALUES (:username, :password, :accountType, :reg_date)");
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
  $stmt->bindParam(':accountType', $accountType, PDO::PARAM_STR);
  $stmt->execute();
  unset( $_SESSION['form_token'] );
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
?>
