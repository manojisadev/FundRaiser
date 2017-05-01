<?php
session_start();
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
}

$pid = '';

if(!empty($_GET['pid']) && isset($_GET['pid'])){
	$pid = $_GET['pid'];
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
$query = "Select * FROM Projects WHERE pid = '$pid'";

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
		<form class="form-horizontal text-center" method="post" action="donate.php">	
		<?php
		while($row = mysqli_fetch_assoc($result)) {
		?>
			
			<div class="panel panel-primary">
			<div class="panel-heading">
			<div class="form-group ">
			<h3><label for="name" class="cols-sm-2 label">Project ID</label></h3>
			<div class="cols-sm-10">
			<label for="name" class="cols-sm-2 control-label"><?php
			echo $row["pid"] . "</label>"; ?></div></div></div>

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
			<input type="submit" value="Donate" >
			<input type="button" value="Like" > <hr></div></div>

			<?php
			
		}
		?>
<?php 

$query1 = "Select * FROM Comments AS C INNER JOIN Users AS U ON U.uid = C.uid WHERE C.pid = '$pid'";

$result1 = mysqli_query($connection, $query1);
if(!$result1) {
	die("Database query failed.");
} 

while($row = mysqli_fetch_assoc($result1)) {
	echo $row["Ufirst_name"]. "<br>";
	echo $row["Ccomment"]. "<br>";
}
?>
	
<div class="container">
  <div class="row main">
    <div class="panel-heading">
      <div class="panel-title text-center">
        <h1 class="title">Add comment</h1>
        <hr/>
      </div>
    </div>
    <div class="main-login main-center"> 
      <form class="form-horizontal" method="post" action="#">
        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Your Comment</label>
            <div class="cols-sm-10">            
                <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your comment"/>
            </div>
        </div>

          

            <div class="form-group ">
              <button type="button" class="btn btn-primary btn-lg btn-block login-button">Add</button>
            </div>
      </form>
    </div>
  </div>
</div>  






