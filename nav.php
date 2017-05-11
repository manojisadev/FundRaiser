<?php 
session_start();
if(!isset($_SESSION['username']) && isset($_COOKIE['username']) && !empty($_COOKIE['username']) ) {
  $_SESSION['username'] = $_COOKIE['username'];
}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"> </i> FundRaiser</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="landing.php">Home</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="project.php">View Projects</a></li>
      <li><a href="createproj.php">New Project</a></li>
      <li><a href="CreditCard.php">Manage Cards</a></li>
      <?php 
      if( (isset($_COOKIE['username']) && !empty($_COOKIE['username'])) || (isset($_SESSION['username']) ))
        { echo "<li><a href='logout.php'>Logout</a></li>";}
      ?>
    </ul>
  </div>
</nav>
