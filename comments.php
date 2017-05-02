<?php

if(isset($_POST['username']) && isset($_POST['comment']) && isset($_POST['pid'])){
	$username = $_POST['username'];
	$comment = $_POST['comment'];
	$pid = $_POST['pid'];
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

?>


<?php 

$query = "SELECT * FROM Users WHERE Uemail='$username'";

$result = mysqli_query($connection, $query1);
if(!$result) {
	die("Database query failed.");
} 

while($row = mysqli_fetch_assoc($result1)) {
	echo $row["Ufirst_name"]. "<br>";
}

?>