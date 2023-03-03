<?php

include_once('connects.php');
$t = $_GET['temp'];
$h = $_GET['humidity'];
$le = $_GET['light_exp'];
$sm = $_GET['soil_mois'];


$result = mysqli_query($con,"INSERT INTO `status`(`temp`, `humidity`, `soil_mois`, `light_exp`) VALUES($t,$h,$sm,$le)");
echo "weee";

?>