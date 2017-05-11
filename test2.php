<!DOCTYPE html>

<head>
<title></title>
</head>

<body>

<form action="" method='post' enctype="multipart/form-data">
Description of Video: <input type="text" name="description_entered"/><br><br>
<input type="file" name="file"/><br><br>
  
<input type="submit" name="submit" value="Upload"/>

</form>
<?php
error_reporting(E_ERROR | E_PARSE); 
$pid=$_GET['pid'];
$uid=$_GET['uid'];
$name= $_FILES['file']['name'];
$tmp_name= $_FILES['file']['tmp_name'];
$submitbutton= $_POST['submit'];
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);
$description= $_POST['description_entered'];

$success= -1;

$descript= 0;

if (empty($description))
{
$description='new resource';  
$descript= 1;
}

if (isset($name)) {

$path= 'Uploads/videos/';

if (!empty($name)){
if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
{
$success=0;
echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
}

else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
{
$success=1;
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
}
}
}
}
?>

<?php

$user = "root"; 
$password = "root"; 
$host = "localhost"; 
$dbase = "dbpro1"; 
$table = "Resources"; 

$connection= mysqli_connect ($host, $user, $password,$dbase);
if(mysqli_connect_error()) {
  die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
    );
}
$flag=1;

if((!empty($description)) && ($success == 1)){
mysqli_query($connection,"INSERT INTO $table (pid,uid,Rupload_time,Rdescription, Rcontent, Rflag,extension)
VALUES ($pid,$uid,now(),'$description', '$name', $flag,'$fileextension')") or die(mysqli_error($connection));
}

mysqli_close($connection);

?>
<p id="para6">Videos</p>

<?php
$user = "root"; 
$password = "root"; 
$host = "localhost"; 
$dbase = "dbpro1"; 
$table = "Resources"; 

// Connection to DBase 
$connection=mysqli_connect($host,$user,$password,$dbase); 
if(mysqli_connect_error()) {
  die("Database connection failed" . mysqli_connect_error() . "(" . mysqli_connect_errno().")"
    );
}
$result= mysqli_query($connection, "SELECT * FROM $table ORDER BY Rupload_time DESC" ) ;
 

print "<table border=1>\n"; 
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
$videos_field= $row['Rcontent'];
$video_show= "Uploads/videos/$videos_field";
$descriptionvalue= $row['Rdescription'];
$fileextensionvalue= $row['extension'];
print "<tr>\n"; 
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><video width='320' controls><source src='$video_show' type='video/$fileextensionvalue'>Your browser does
not support the video tag.</video></div>";
print "</td>\n";
print "</tr>\n"; 
} 
print "</table>\n";  
print "<a href='projdetail.php?pid=$pid'>Go back to Project Details</a>";

?> 
</body>
</html>