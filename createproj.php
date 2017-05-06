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
        <h1 class="title">New Project</h1>
        <hr/>
      </div>
    </div>
    <div class="main-login main-center"> 
      <form class="form-horizontal" method="post" action="#">

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Project Name</label>
            <div class="cols-sm-10">            
              <input type="text" class="form-control"  id="project-name"  placeholder="Enter your project name"/>
                
            </div>
        </div>

          <div class="form-group">
            <label for="CardNumber" class="cols-sm-2 control-label">Project Category</label>
            <div class="cols-sm-10">
              
                
              <select class="form-control" id="cid-bt">
                <?php 
                $query = "SELECT * FROM Categories";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                  die("Database query failed.");
                } else {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<option value=" . $row["cid"] . ">" . $row["CAcname"] . "</option>";
                    }
                }
                ?>
              </select>
             
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Project Description</label>
            <div class="cols-sm-10">
              <textarea class="form-control" id="project-desc" placeholder="Enter your project description" /></textarea>
                
                
             
            </div>
          </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Campaign End Date</label>
              <div class="cols-sm-10">
                
                  <input type="text" class="form-control"  id="end-date"  placeholder="MM/DD/YYY""/>
                
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Project Completion Date (Tentative)</label>
              <div class="cols-sm-10">
                
                  <input type="text" class="form-control" id="project-comp"  placeholder="MM/DD/YYY" />
                
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Minimum Money</label>
              <div class="cols-sm-10">
                
                  <input type="number" class="form-control" id="min-money"   placeholder="Enter minimum target for campaign" pattern=".{1,}"   required />
               
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Maximum Money</label>
              <div class="cols-sm-10">
                
                  <input type="number" class="form-control"  id="max-money"  placeholder="Enter maximum target for campaign" pattern=".{1,}"   required />
               
              </div>
            </div>



            <div class="form-group ">
              <button type="button" id="proj-crt" class="btn btn-primary btn-lg btn-block login-button">Create!</button>
            </div>

      </form>
    </div>
  </div>
</div>  

<script src ="bt3/js/jquery-3.2.1.min.js"></script>
<script src="bt3/js/newproj.js"></script>
</body>
</html>