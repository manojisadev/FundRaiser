<?php
session_start();
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
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

?>
<html>
<head>
	<link rel="stylesheet" href="bt3/css/style1.css">
	<link rel="stylesheet" href="bt3/css/bootstrap.css">

</head>
<title>Login</title>
<body>
<?php include("nav.php"); ?>

<?php 

$query = "SELECT * FROM Users WHERE Uemail='$username'";

$result = mysqli_query($connection, $query);

if(!$result) {
	echo " <br> Unauthorized user, please Login";
} else {
	while($row = mysqli_fetch_assoc($result)) {
		$uid = $row["uid"];
		$lastlog = $row["Ulast_log"];
	}

	$query = "SELECT * FROM Follows WHERE uid='$uid'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		echo " <br> Unauthorized user, please Login";
	} else {
		while($row = mysqli_fetch_assoc($result)) {
			$fid = $row["fid"];
			$query = "SELECT * FROM Users WHERE uid='$fid'";

			$result = mysqli_query($connection, $query);
			if($result) {
				$row = mysqli_fetch_assoc($result);
				$name = $row["Uemail"];
			}
			
			$query = "SELECT * FROM Likes where uid = '$fid' AND Lliked_time > '$lastlog' ";
			$result = mysqli_query($connection, $query);
			if($result) {
				while($row = mysqli_fetch_assoc($result)) {
					$ppid = $row["pid"];
					$query = "SELECT * FROM Projects where pid ='$ppid'";
					$result = mysqli_query($connection, $query);
					$row = mysqli_fetch_assoc($result);
					echo "<a href=". "projdetail.php?pid=". $ppid . ">". $name. " has liked the project  " . $row["Pname"] . "<br></a>";
				}
			}

			$query = "SELECT * FROM Comments where uid = '$fid' AND Ccomment_time > '$lastlog' ";
			$result = mysqli_query($connection, $query);
			if($result) {
				while($row = mysqli_fetch_assoc($result)) {
					$ppid = $row["pid"];
					$query = "SELECT * FROM Projects where pid ='$ppid'";
					$result = mysqli_query($connection, $query);
					$row = mysqli_fetch_assoc($result);
					echo "<a href=". "projdetail.php?pid=". $ppid . ">". $name. " has commented on the project " . $row["Pname"] . "<br></a>";
				}
			}

			$query = "SELECT * FROM Projects where uid = '$fid'AND Pstart_date > '$lastlog' ";
			$result = mysqli_query($connection, $query);
			if($result) {
				while($row = mysqli_fetch_assoc($result)) {
					

					echo "<a href=". "projdetail.php?pid=". $row["pid"] . ">". $name. " has started a new project called " . $row["Pname"] . "<br></a>";
				}
			}

			// $query = "SELECT * FROM Comments where uid = '$fid' AND Ccomment_time >  '2017-05-06 15:31:15' ";
			// $query = "SELECT * FROM Project where uid = '$fid'AND Pstart_date > '2017-05-06 15:31:15'";

		}


}
} ?>
