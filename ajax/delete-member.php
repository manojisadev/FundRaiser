<?php 
session_start();

if(isset($_POST['uid']) && isset($_POST['pid'])) {
	$uid = $_POST['uid'];
	$pid = $_POST['pid'];

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "dbpro1";
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if(mysqli_connect_error()) {
		die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
			);
	}

	$query = "DELETE FROM Team_Members WHERE pid = '$pid' AND uid = '$uid'";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Database query failed.");
	} else {
		echo "Deleted";
	}
} else {
	header("Location: project.php");
}



?>
