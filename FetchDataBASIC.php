<?php

$DB_HOST = "localhost";
$DB_USER = "root"; 
$DB_PASS = ""; 
$DB_NAME = "IOT";

$conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);


$query = "SELECT * FROM `sensor`";
$check=mysqli_query($conn,$query);
$row=mysqli_num_rows($check);


if($check == FALSE) { 
    echo ".".$row."."; // TODO: better error handling
}

while($row=mysqli_fetch_array($check))
  	{
  	
	echo $row['data'] ;
    
  	
  	}
  
   

//echo "Loaded";
?>