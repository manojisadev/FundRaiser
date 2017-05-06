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
	<link rel="stylesheet" href="bt3/css/bootstrap.css">
  <link rel="stylesheet" href="bt3/css/register_css.css">
</head>
<title>Index</title>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"> </i> FundRaiser</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="createproj.php">New Project</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>


<?php 
$query = "Select * FROM Projects";

$result = mysqli_query($connection, $query);
if(!$result) {
	die("Database query failed.");
} 
?>
<div class="container">
	<div class="row ">
		<div class="panel-heading">
			<div class="panel-title text-center">
				<h1 class="title">Projects</h1>
				<hr/>
			</div>
		</div>
		<div class="main-login main-center">
			
		<?php
		while($row = mysqli_fetch_assoc($result)) {
		?>
			<a href="projdetail.php?pid=<?php echo $row["pid"] ?>" >
			<form class="form-horizontal text-center" method="post" action="projdetail.php">
			
			<div class="panel panel-primary">
			<div class="panel-heading">
			<div class="form-group ">
			<h3><label for="name" class="cols-sm-2 label">Project Name</label></h3>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Pname"] . "</label>"; ?></div></div></div>

			<div class="panel-body">
			<div class="form-group">
			<label for="name" class="cols-sm-2 label label-default">Project Description</label>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Pdescription"] . "</label>"; ?></div></div>

			<div class="form-group">
			<label for="name" class="cols-sm-2 label label-default">Min Price</label>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Pmin_price"] . "</label>"; ?></div></div>

			<div class="form-group">
			<label for="name" class="cols-sm-2 label label-default">Max Price</label>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["Pmax_price"] . "</label>"; ?></div></div>
		 
		 	<input type="hidden" name="pid" value="<?php echo $row["pid"] ?>">
			<!-- <input type="submit" >  -->
			<hr></div></div></a>
			<?php
			
		}
		?>



