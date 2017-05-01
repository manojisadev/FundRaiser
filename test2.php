<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "midterm";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_error()) {
	die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
		);
} else {
  echo "connected";
}

?>
<html>
<head>
	<link rel="stylesheet" href="bt3/css/bootstrap.css">
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








<form action="test2.php" method="post" enctype="multipart/form-data">
File : <input type="file" name="image" value=""> <br>
name : <input type="text" name="keyword" value=""> <br>
<input type="submit" name="submit" value="submit">
</form>
<?php 

$file = $_FILES['image']['tmp_name'];

if(!isset($file)) {
  echo "Please select an image!";
} else {
$image = file_get_contents($_FILES['image']['tmp_name']);
$image_name = $_FILES['image']['name'];


if(getimagesize($_FILES['image']['tmp_name']) == FALSE) {
  echo "Please enter a correct image";
} 

else {
echo "enter here";
$query = "INSERT INTO test1 (content) VALUES ('$image'); ";
$result1 = mysqli_query($connection,$query);
echo "exited here";
if(!$result1)
  echo "error";
else {
  echo "Uploaded";
}
}
}
?>


<script src ="bt3/js/jquery-3.2.1.min.js"></script>
<script src ="bt3/js/bootstrap.js"></script>

</body>

</html>
