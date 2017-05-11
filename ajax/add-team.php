<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "dbpro1";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if( isset($_SESSION['username']) && isset($_POST['email']) && isset($_POST['pid']) ){
	$username = $_SESSION['username'];
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	//$email = $_POST['email'];
	$pid = mysqli_real_escape_string($connection, $_POST['pid']);
	//$pid = $_POST['pid'];
} else {
	header("Location: login.php");
	exit;
}

?>

<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "dbpro1";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_error()) {
	die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
		);
}

$query = "SELECT * FROM Users WHERE Uemail='$username'";

$result = mysqli_query($connection, $query);
if(!$result) {
	echo $username;
	die("Database query failed.");
} 
$uid = '';
while($row = mysqli_fetch_assoc($result)) {
	$uid = $row["uid"];
}

?>

<?php 

$query ="SELECT * FROM Users WHERE Uemail ='$email'";
$result = mysqli_query($connection, $query);
if(!$result) {
	echo $username;
	die("Database query failed.");
} 
$uuid = '';
while($row = mysqli_fetch_assoc($result)) {
	$uuid = $row["uid"];
}
?>

<?php 
$query ="SELECT * FROM Follows WHERE uid ='$uuid' AND fid ='$uid'";
$result = mysqli_query($connection, $query);
if(!$result) {
	
	die("Database query failed.");
} else {
		if(mysqli_num_rows($result)!=0) {
		$query = "INSERT INTO Team_Members (uid,pid) VALUES ('$uuid','$pid')  ";
		$result = mysqli_query($connection, $query);
		if(!$result) {
			// echo "You can't add some one who isn't following you";
			die("Database query failed.");
		} else {
			echo("Added Member");
		} 
	} else {
		echo "You can't add some one who isn't following you";
	}
}	

?>