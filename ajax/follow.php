<?php
session_start();
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];

} else {
	$username = '';
}
if(isset($_POST['follow_value']) && isset($_POST['uid'])){
	$follow_value = $_POST['follow_value'];
	$fid = $_POST['uid'];
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
	die("Database query failed in getting uid.");
} 
$uid = '';
while($row = mysqli_fetch_assoc($result)) {
	$row["Ufirst_name"];
	$uid = $row["uid"];
}

if($follow_value == 'Follow') {
	$query = "INSERT INTO Follows (uid,fid) VALUES ('$uid','$fid')";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Database query failed in inserting." . mysqli_error($connection));
	} 

	echo "Unfollow";
} else {
	$query = "DELETE FROM Follows WHERE uid='$uid' AND fid='$fid'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Database query failed in deleting.");
	} 
	echo "Follow";
}
?>