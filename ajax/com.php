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

$result = mysqli_query($connection, $query);
if(!$result) {
	echo $username;
	die("Database query failed.");
} 
$uid = '';
while($row = mysqli_fetch_assoc($result)) {
	 $row["Ufirst_name"];
	$uid = $row["uid"];
}

$query1 = "INSERT INTO Comments (pid,uid,Ccomment,Ccomment_time) VALUES('$pid','$uid','$comment',now())";
$result1 = mysqli_query($connection, $query1);
if(!$result1) {
	echo(mysqli_error($connection));
} else {
	echo $username;
	echo $comment;
}

?>