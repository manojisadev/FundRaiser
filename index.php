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


<?php

$query = "Select * FROM Projects AS P INNER JOIN Likes AS L ON L.pid = P.pid INNER JOIN Resources AS R ON R.pid = L.pid WHERE P.Pstatus IN (0,1)" ;
$result = mysqli_query($connection, $query);

if(!$result) {
	die("Database query failed.");
} elseif(mysqli_num_rows($result) == 0) { 
	echo "<br> Sorry the projects are not available at this moment. ";
} else {
	while($row = mysqli_fetch_assoc($result)) {
		echo $row["Rcontent"] . "<br>";
	}
}

?>



<form action="keyword.php" method="post">
Username : <input type="text" name="username" value=""> <br>
Keyword : <input type="text" name="keyword" value=""> <br>
<input type="submit" name="submit" value="submit">
</form>

<script src ="bt3/js/jquery-3.2.1.min.js"></script>
<script src ="bt3/js/bootstrap.js"></script>

</body>

</html>
