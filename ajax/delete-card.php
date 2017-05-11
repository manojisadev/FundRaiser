<?php 
session_start();

if(isset($_POST['CNID']) && isset($_SESSION['username'])) {
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "dbpro1";
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	$CNID = mysqli_real_escape_string($connection, $_POST['CNID']);
	//$CNID = $_POST['CNID'];

	if(mysqli_connect_error()) {
		die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
			);
	}

	$query = "DELETE FROM CreditCard WHERE CNID = '$CNID'";

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
