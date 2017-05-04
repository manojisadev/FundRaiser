<?php

if(isset($_POST['username']) && isset($_POST['like_value']) && isset($_POST['pid'])){
	$username = $_POST['username'];
	$like_value = $_POST['like_value'];
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
	die("Database query failed.");
} 
$uid = '';
while($row = mysqli_fetch_assoc($result)) {
	$row["Ufirst_name"];
	$uid = $row["uid"];
}

if($like_value == 'Like') {
	$query = "INSERT INTO Likes (pid,uid,Lliked_time) VALUES ('$pid','$uid',now())";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Database query failed.");
	} 

	echo "Unlike";
} else {
	$query = "DELETE FROM Likes WHERE pid='$pid' AND uid='$uid'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Database query failed.");
	} 
	echo "Like";
}

?>