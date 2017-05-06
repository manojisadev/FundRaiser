<?php

if(isset($_POST['CVVNumber']) && isset($_POST['username']) && isset($_POST['OwnerName']) && isset($_POST['CreditNumber']) && isset($_POST['ExpirationDate'])){
	$username = $_POST['username'];
	$OwnerName = $_POST['OwnerName'];
	$CreditNumber = $_POST['CreditNumber'];
	$CVVNumber = $_POST['CVVNumber'];
	$ExpirationDate = ($_POST['ExpirationDate']);
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

?>



<?php 
$query ="SELECT COUNT(*) AS Occ FROM CreditCard";
$result = mysqli_query($connection, $query);
if(!$result) {
	die("Database query failed.");
} 
$count = '';
while($row = mysqli_fetch_assoc($result)) {
	$count = $row["Occ"]+1;
}
$query = "SELECT * FROM CreditCard WHERE uid = '$uid'";
$result = mysqli_query($connection, $query);
if(!$result) {
	die("Database query failed.");
}
while($row = mysqli_fetch_assoc($result)) {
	if($row["CreditCard"] == $CreditCard && $row["OwnerName"] == $OwnerName && $row["CVVNumber"] == $CVVNumber && $row["ExpirationDate"] == $ExpirationDate) {
		die("The card already exists");
	}
}
$query = "INSERT INTO CreditCard (CNID,uid,CreditNumber,CVVNumber,ExpirationDate,OwnerName) VALUES ('$count','$uid','$CreditNumber','$CVVNumber','$ExpirationDate','$OwnerName')";
$result = mysqli_query($connection, $query);
	if(!$result) {
		echo (mysqli_error($connection));
		die("Database query failed.");
	} else {
		echo "Inserted!";
	}
'6'

?>