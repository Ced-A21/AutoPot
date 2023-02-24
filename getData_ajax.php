<form action="index.php" method="POST">
    <center>
        <?php
            include_once('connects.php');

            $query = "SELECT * FROM `status` ORDER BY id DESC LIMIT 1";
            $check=mysqli_query($con,$query);
            $row=mysqli_num_rows($check);


            if($check == FALSE) {
                echo ".".$row.".";
            }

            while($row=mysqli_fetch_array($check))
  	            {
  	            echo "Temperature: ";
	            echo $row['temp'] ;
                    echo "</br>";
	            echo "Humidity: ";
	            echo $row['humidity'] ;
                    echo "</br>";
	            echo "Soil Moisture: ";
	            echo $row['soil_mois'] ;
                    echo "</br>";
	            echo "Light Exposure: ";
	            echo $row['light_exp'] ;
                    echo "</br>";
	            echo "Timestamp: ";
	            echo $row['timestamp'] ;
                    echo "</br>";
  	            echo "---------------------------------------------------</br>";
  	            }
        ?>
    </center>
<<<<<<< HEAD
</form>
=======
</form>
>>>>>>> 21bd146f88f1d359f753bd4f78091dbc5a49920e
