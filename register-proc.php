<?php 

if( isset($_POST['Uemail']) && isset($_POST['Ufirst_name']) && isset($_POST['Ulast_name']) && isset($_POST['Upassword']) && isset($_POST['confirm']) && isset($_POST['Uaddress']) && isset($_POST['Uphone']) )
{
	$Uemail = $_POST['Uemail'];
	$Ufirst_name = $_POST['Ufirst_name'];
	$Ulast_name = $_POST['Ulast_name'];
	$Upassword = $_POST['Upassword'];
	$confirm = $_POST['confirm'];
	$Uaddress = $_POST['Uaddress'];
	$Uphone = $_POST['Uphone'];

	if($Upassword != $confirm) {

		echo "Please enter matching passwords";
		echo "<a href='register.php'>Register</a>";
	}
} else {
	header("Location: login.php");
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

$query ="SELECT COUNT(*) AS Occ FROM Users";
$result = mysqli_query($connection, $query);
if(!$result) {
	echo("Database query failed.");
	echo "<a href='register.php'>Register</a>";
} 
$count = '';
while($row = mysqli_fetch_assoc($result)) {
	$count = $row["Occ"]+1;
}

$query = "INSERT INTO Users (uid,Ufirst_name,Ulast_name,Uaddress,Uemail,Upassword,Uphone,Ujoin_date) VALUES ('$count','$Ufirst_name','$Ulast_name','$Uaddress','$Uemail','$Upassword','$Uphone',now()) ";
$result = mysqli_query($connection, $query);
if(!$result) {
	echo("Must have unique email.");
	echo "<a href='register.php'>Register</a>";
} else {
	header("Location: login.php");
}

?>


