<?php
session_start();
$uid='';
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];

} else {
	$username = '';
}

if(!empty($_GET['uid']) && isset($_GET['uid'])){
	$uid = $_GET['uid'];
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "dbpro1";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_error()) {
	die("Database connection failed11" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
		);
}

$followed = 'Follow';
$query = "SELECT * FROM Users WHERE uid='$uid'";

$result = mysqli_query($connection, $query);
if(!$result) {
	$followed = 'Follow';
} else {
	while($row = mysqli_fetch_assoc($result)) {
		$uid = $row["uid"];
		$query3 = "SELECT * FROM Follows WHERE uid IN (select uid from Users where Uemail='$username') AND fid = '$uid'";
		$result2 = mysqli_query($connection, $query3);
		$row = mysqli_fetch_assoc($result2);
		if($row["uid"]) {
			$followed = 'Unfollow';
		} else {
			$followed = 'Follow';
		}				
	}
}
?>





<html>
<head>
	<link rel="stylesheet" href="bt3/css/style1.css">
	<link rel="stylesheet" href="bt3/css/bootstrap.css">


</head>
<title>Login</title>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"> </i> FundRaiser</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="login.php">Login</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

<body>



<?php 
$query = "Select * FROM Users WHERE uid = '$uid'";

$result = mysqli_query($connection, $query);
if(!$result) {
	die("Database query failed111111.");
} 
?>

<div class="container">
	<div class="row ">
		<div class="panel-heading">
			<div class="panel-title text-center">
				<h1 class="title">User Details</h1>
				<hr/>
			</div>
		</div>
		<div class="main-login main-center">
		<form class="form-horizontal text-center" method="post" action="donate.php">	
		<?php
		while($row = mysqli_fetch_assoc($result)) {
		?>
			
			<?php 
			$ufname=$row["Ufirst_name"];
			$ulname=$row["Ulast_name"];
			?>
			<div class="panel panel-primary">
			<div class="panel-heading">
			<div class="form-group ">
			<h3><label for="name" class="cols-sm-2 label">Name</label></h3>
			<div class="cols-sm-10">
			<label for="name" id="pid" class="cols-sm-2 control-label" value="<?php echo $row["uid"] ?>"><?php
			echo  "$ufname $ulname"; ?></label></div></div></div>

			<div class="panel-body">
			<div class="form-group">
			<label for="name" class="cols-sm-2 label label-default">Address</label>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Uaddress"] . "</label>"; ?></div></div>

			<div class="form-group">
			<label for="name" class="cols-sm-2 label label-default">Email</label>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Uemail"] . "</label>"; ?></div></div>

			<div class="form-group">
			<label for="name" class="cols-sm-2 label label-default">Phone</label>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Uphone"] . "</label>"; ?></div></div>
			
			<div class="form-group">
			<label for="name" class="cols-sm-2 label label-default">Join Date</label>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Ujoin_date"] . "</label>"; ?></div></div>
			
		 
		 	<input type="hidden" id="uid" name="uid" value="<?php echo $row["uid"] ?>">
			<button type="button" class="btn btn-primary" id="follow-bt" value="<?php echo $followed ?>" ><span id="span-liked"><?php echo $followed ?></span></button><hr></div></div>
			</form>
			<?php
		}
		?> 

<script src ="bt3/js/jquery-3.2.1.min.js"></script>
<script src="bt3/js/follow.js"></script>
</body>
</html>

