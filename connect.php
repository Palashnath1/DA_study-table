
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";
$port="3308";

$con = new mysqli($servername, $username, $password, $dbname,$port);

if($con){
    // echo 'connection successfull';
}
else{
    die(mysqli_error($con));
}
?>