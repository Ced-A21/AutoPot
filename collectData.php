<?php 

include_once('connects.php');
$message = $_GET['indata'];

$result = mysqli_query($con,"INSERT INTO sensor (data) VALUES('$message')");
echo "weee";

?>