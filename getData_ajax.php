<form action="index.php" method="POST">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
        }

        html {
            display: table;
            margin: auto;
        }

        body {
            display: table-cell;
            vertical-align: middle;
        }
        .statstext {
            font-family: "Fjalla One";
            font-size: 36px;
        }
    </style>
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
                      echo "<div class='card-columns'>
                    <div class='card text-white bg-success mb-3' style='max-width: 18rem;'>
                        <div class='card-body'>
                            <p class='card-title' align='left'>Temperature<p>
                            <p class='card-text statstext'>" . $row['temp'] . "°C</p>";
                        echo "</div>
                    </div>
                    <div class='card text-white bg-success mb-3' style='max-width: 18rem;'>
                        <div class='card-body'>
                            <p class='card-title' align='left'>Humidity<p>
                            <p class='card-text statstext'>" . $row['humidity'] . "%</p>";
                        echo "</div>
                    </div>
                    <div class='card text-white bg-success mb-3' style='max-width: 18rem;'>
                        <div class='card-body'>
                            <p class='card-title' align='left'>Soil Moisture<p>
                            <p class='card-text statstext'>" . $row['soil_mois'] . "%</p>";
                        echo "</div>
                    </div>
                    <div class='card text-white bg-success mb-3' style='max-width: 18rem;'>
                        <div class='card-body'>
                            <p class='card-title' align='left'>Light Exposure<p>
                            <p class='card-text statstext'>" . $row['light_exp'] . "IU</p>";
                        echo "</div>
                     </div>
                </div>";
            }
        ?>
    </center>
</form>
