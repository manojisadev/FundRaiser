<?php
ob_start();

session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "dbpro1";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(isset($_POST['username'])){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$_SESSION['username'] = $username;
	$expire = time() + (60*5);
	setcookie("username",$username,$expire);
}
?>



<?php

if(isset($_POST['username'])){
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	//$password = $_POST['password'];
} else {
	header("Location: login.php");
} ?>

<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "dbpro1";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_error()) {
	die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
		);
} ?>

<?php 

$query1 = "Select * FROM Users WHERE Uemail = '$username' AND Upassword = '$password'";
$result = mysqli_query($connection,$query1);

if(!$result) {
	die("Database Query Failed.");
	echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
if(mysqli_num_rows($result) == 0) {
	echo $username;
	echo " <br> Unauthorized user, please query again";
	header("Location: login.php");
	exit;
	
} else {
	$query1 = "UPDATE Users SET Ulast_log = NOW() WHERE Uemail = '$username' AND Upassword = '$password'";
	$result = mysqli_query($connection,$query1);

	echo $username;
	echo " Succesfully logged in";
	header("Location: project.php");
	 ob_end_flush();

	
	} 

?>

