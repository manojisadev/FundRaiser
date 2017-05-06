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
        <h1 class="title">Register</h1>
        <hr/>
      </div>
    </div>
    <div class="main-login main-center"> 
      <form class="form-horizontal" method="post" action="register-proc.php">

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Your Email(Username)</label>
            <div class="cols-sm-10">            
                <input type="text" class="form-control" name="Uemail" placeholder="Enter your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
                
            </div>
        </div>

          <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Your First name</label>
            <div class="cols-sm-10">
              
                
                <input type="text" class="form-control"  name="Ufirst_name"  placeholder="Enter your first name"/>
             
            </div>
          </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Last Name</label>
              <div class="cols-sm-10">
                
                  <input type="text" class="form-control"  name="Ulast_name"  placeholder="Enter your last name"/>
                
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                
                  <input type="password" class="form-control" name="Upassword"  placeholder="Enter your Password" pattern=".{5,}" required/>
                
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
              <div class="cols-sm-10">
                
                  <input type="password" class="form-control" name="confirm"   placeholder="Confirm your Password" pattern=".{5,}"   required />
               
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Address</label>
              <div class="cols-sm-10">
                
                  <input type="input" class="form-control"  name="Uaddress"  placeholder="Address" />
               
              </div>
            </div>

            <div class="form-group">
              <label for="number" class="cols-sm-2 control-label">Phone Number</label>
              <div class="cols-sm-10" >
                
                  <input type="input" class="form-control"  name="Uphone"  placeholder="Phone number" pattern=".{10,10}"   required/>
               
              </div>
            </div>

            <div class="form-group ">
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
            </div>
            <div class="login-register">
              <a href="index.php">Login</a>
            </div>
      </form>
    </div>
  </div>
</div>  

