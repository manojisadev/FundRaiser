<?php 
session_start();

if(isset($_POST['cid']) && isset($_POST['Pname']) && isset($_POST['Pdescription']) && isset($_POST['Plast_date']) && isset($_POST['Pproj_date']) && isset($_POST['Pmin_price']) && isset($_POST['Pmax_price']) && isset($_SESSION['username'])) {
	$cid = $_POST['cid'];
	$Pname = $_POST['Pname'];
	$Pdescription = $_POST['Pdescription'];
	$Plast_date = $_POST['Plast_date'];
	$Pproj_date = $_POST['Pproj_date'];
	$Pmin_price = $_POST['Pmin_price'];
	$Pmax_price = $_POST['Pmax_price'];		
	$username = $_SESSION['username'];



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
		 $row["Ufirst_name"];
		$uid = $row["uid"];
	}
	$query ="SELECT COUNT(*) AS Occ FROM Projects";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		die("Database query failed.");
	} 
	$count = '';
	while($row = mysqli_fetch_assoc($result)) {
		$count = $row["Occ"]+1;
	}

	$query = "INSERT INTO Projects (pid,uid,cid,Pname,Pdescription,Pstart_date,Plast_date,Pproj_date,Pmin_price,Pmax_price,Pstatus) VALUES ('$count','$uid','$cid','$Pname','$Pdescription',NOW(),'$Plast_date','$Pproj_date','$Pmin_price','$Pmax_price','0')";

	$result = mysqli_query($connection, $query);
	if(!$result) {
		die(mysqli_error($connection)
			);
	} else {
		echo "Created!";
	}
} else {
	header("Location: login.php");
}



?>
