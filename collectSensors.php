<?php 

include_once('connects.php');
$t = $_GET['temp'];
$h = $_GET['humidity'];
$le = $_GET['light_exp'];


$result = mysqli_query($con,"INSERT INTO status (temp,humidity,light_exp) VALUES($t,$h,$le)");
echo "weee";

?>