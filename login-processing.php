<?php
ob_start();

session_start();
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$_SESSION['username'] = $username;
}
?>



<?php
$username ='';
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
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
	echo $username;
	echo " Succesfully logged in";
	header("Location: project.php");
	 ob_end_flush();

	exit;
	} 

?>

