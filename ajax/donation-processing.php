
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

if(isset($_POST['pid']) && isset($_POST['CNID']) && isset($_POST['uid']) && isset($_POST['Amount'])){

	$uid = mysqli_real_escape_string($connection, $_POST['uid']);
	//$uid = $_POST['uid'];
	$CNID = mysqli_real_escape_string($connection, $_POST['CNID']);
	//$CNID = $_POST['CNID'];
	$pid = mysqli_real_escape_string($connection, $_POST['pid']);
	//$pid = $_POST['pid'];
	$Amount = mysqli_real_escape_string($connection, $_POST['Amount']);
	//$Amount = intval($_POST['Amount']);
	$status = '0';
}

?>



<?php 

$query = "INSERT INTO Donors (uid,pid,Dmoney,Dpledged_time,CNID,Dstatus) VALUES ('$uid','$pid','$Amount',now(),'$CNID','$status')";
$result = mysqli_query($connection, $query);
	if(!$result) {
		echo (mysqli_error($connection)) . $pid;
		die("Database query failed.");
	} else {
		echo "Inserted!" . $Amount;
	}


?>