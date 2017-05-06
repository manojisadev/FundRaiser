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
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row main">
    <div class="panel-heading">
      <div class="panel-title text-center">
        <h1 class="title">New Card</h1>
        <hr/>
      </div>
    </div>
    <div class="main-login main-center"> 
      <form class="form-horizontal" method="post" action="#">
        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Card Holder Name</label>
            <div class="cols-sm-10">            
                <input type="text" class="form-control" name="name" id="owner-name"  placeholder="Enter your Name"/>
            </div>
        </div>

          <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Card Number</label>
            <div class="cols-sm-10">
              
                
                <input type="number" class="form-control" name="email" id="card-number"  placeholder="Enter your Email"/>
             
            </div>
          </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">CVV</label>
              <div class="cols-sm-10">
                
                  <input type="password" class="form-control" name="username" id="cvv"  placeholder="Enter your CVV"/>
                
              </div>
            </div>


            <div class="form-group"> <!-- Date input -->
              <label class="control-label" for="date">Expiration Date</label>
              <input class="form-control" id="exp-date"  name="date" placeholder="MM/DD/YYY" type="text"/>
            </div>

            <div class="form-group ">
              <button type="button" class="btn btn-primary btn-lg btn-block login-button" id ="add-card" value ="<?php echo $username ?>">Add</button>
            </div>

            </form>
    </div>
  </div>
</div>  


<?php 
$query = "Select * FROM CreditCard AS C INNER JOIN Users AS U ON U.uid = C.uid WHERE U.Uemail = '$username'";

$result = mysqli_query($connection, $query);
if(!$result) {
  die("Database query failed.");
} 
?>
<div class="container">
  <div class="row ">
    <div class="panel-heading">
      <div class="panel-title text-center">
        <h1 class="title">Cards</h1>
        <hr/>
      </div>
    </div>
    <div class="main-login main-center">
      
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?>
      
      <form class="form-horizontal text-center" method="post" action="projdetail.php">
      
      <div class="panel panel-primary">
      <div class="panel-heading">
      <div class="form-group ">
      <h3><label for="name" class="cols-sm-2 label">Card Holder Name</label></h3>
      <div class="cols-sm-10">
      <label for="name" class="cols-sm-2 control-label"><?php
      echo $row["OwnerName"] . "</label>"; ?></div></div></div>

      <div class="panel-body">
      <div class="form-group">
      <label for="name" class="cols-sm-2 label label-default">Card Number</label>
      <div class="cols-sm-10">
      <label for="name" class="cols-sm-2 control-label"><?php
      echo $row["CreditNumber"] . "</label>"; ?></div></div>

     
     
      <input type="hidden" id="CNID" value="<?php echo $row["CNID"] ?>">
      <button type="button" id="card-delete" value="<?php echo $row["CNID"] ?>" class="btn btn-danger">Delete</button>
      <hr></div></div>
      <?php
      
    }
    ?>



<script src ="bt3/js/jquery-3.2.1.min.js"></script>
<script src="bt3/js/bootstrap.js"></script>
<script src="bt3/js/addcard.js"></script>

