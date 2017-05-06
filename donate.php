<?php
session_start();
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];

} else {
  $username = '';

}
$pid ='';
if(!empty($_POST['pid']) && isset($_POST['pid'])){
  $pid = $_POST['pid'];
}

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
} else {
  $uid = '';
  while($row = mysqli_fetch_assoc($result)) {
    $row["Ufirst_name"];
    $uid = $row["uid"];
  }
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
      <li><a href="index.php">Home</a></li>
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
        <h1 class="title">Donation</h1>
        <hr/>
      </div>
    </div>
    <div class="main-login main-center"> 
      <form class="form-horizontal" method="post" action="#">
        <div class="form-group">
            <label for="Amount" id="pid-label" value="<?php echo $pid ?>" class="cols-sm-2 control-label">Your Amount</label>
            <div class="cols-sm-10">            
                <input type="number" class="form-control" name="name" id="Amount"  placeholder="Enter your Amount"/>
            </div>
        </div>

          <div class="form-group">
            <label for="CardNumber" class="cols-sm-2 control-label">Your Card</label>
            <div class="cols-sm-10">
              
                
              <select class="form-control" id="cnid-bt">
                <?php 
                $query = "SELECT * FROM CreditCard WHERE uid='$uid'";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                  die("Database query failed.");
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<option value=" . $row["CNID"] . ">" . substr($row["CreditNumber"],0,4) ."-****-****-****" . "</option>";
                    }
                }
                ?>
              </select>
             
            </div>
          </div>

            
            <div class="form-group ">
              <button type="button" id="donate-bt" class="btn btn-primary btn-lg btn-block login-button" value="<?php echo $uid ?>">Donate!</button>
            </div>
            <div class="login-register">
              <a href="CreditCard.php">Add a new card!</a>
            </div>
      </form>
    </div>
  </div>
</div>  

<script src ="bt3/js/jquery-3.2.1.min.js"></script>
<script src="bt3/js/donate.js"></script>
</body>
</html>
