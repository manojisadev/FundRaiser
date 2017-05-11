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

$query = "SELECT * FROM Users WHERE Uemail='$username'";

$result = mysqli_query($connection, $query);
if(!$result) {
	echo $username;
	die("Database query failed.");
} 
$uid = '';
while($row = mysqli_fetch_assoc($result)) {
	$uid = $row["uid"];
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

<div class="container">
  <div class="row main">
    <div class="panel-heading">
      <div class="panel-title text-center">
        <h1 class="title">Add Team Member</h1>
        <hr/>
      </div>
    </div>
    <div class="main-login main-center"> 
      <form class="form-horizontal" method="post" action="#">

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Team Member Email</label>
            <div class="cols-sm-10">            
              <input type="text" class="form-control"  id="mbm-email"  placeholder="Enter your member's email"/>
                
            </div>
        </div>

          <div class="form-group">
            <label for="CardNumber" class="cols-sm-2 control-label">Project Name</label>
            <div class="cols-sm-10">
              
                
              <select class="form-control" id="pid-bt">
                <?php 
                $query = "SELECT * FROM Projects WHERE uid = '$uid' ";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                  die("Database query failed.");
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<option value=" . $row["pid"] . ">" . $row["Pname"] . "</option>";
                    }
                }
                ?>
              </select>
             
            </div>
          </div>

          



            <div class="form-group ">
              <button type="button" id="add-mbm" class="btn btn-primary btn-lg btn-block login-button">Add!</button>
            </div>

      </form>
    </div>
  </div>
</div>  

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
$query = "Select P.pid,P.Pname, T.uid FROM Projects AS P INNER JOIN Team_Members AS T ON T.pid = P.pid AND P.uid = '$uid'";

$result = mysqli_query($connection, $query);
if(!$result) {
	die("Database query failed.");
} else {
	while($row = mysqli_fetch_assoc($result)) {
		$pid1 = $row["pid"];
		$pname = $row["Pname"];
		$uid1 = $row["uid"];
		$query = "SELECT * FROM Users WHERE uid = '$uid1'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result)
		?>
		  <form class="form-horizontal text-center" method="post" action="projdetail.php">
      <div class="panel panel-primary">
      <div class="panel-heading">
      <div class="form-group ">
      <h3><label for="name" class="cols-sm-2 label">Project Name</label></h3>
      <div class="cols-sm-10">
      <label for="name" class="cols-sm-2 control-label"><?php
      echo $pname . "</label>"; ?></div></div></div>

      <div class="panel-body">
      <div class="form-group">
      <label for="name" class="cols-sm-2 label label-default">Member Name</label>
      <div class="cols-sm-10">
      <label for="name" class="cols-sm-2 control-label"><?php
      echo $row["Uemail"] . "</label>"; ?></div></div>
      <input type="hidden" id="uid" value="<?php echo $uid1 ?>">
      <button type="button" id="team-delete" value="<?php echo $pid1 ?>" class="btn btn-danger">Delete</button>
      <hr></div></div>
		<?php
	}
} 
?>
<script src ="bt3/js/jquery-3.2.1.min.js"></script>
<script src="bt3/js/bootstrap.js"></script>
<script src="bt3/js/addmember.js"></script>
