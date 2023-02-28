<form action="index.php" method="POST">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="autopotstyles.css" rel="stylesheet" />
    <style>
        .statstext {
            font-family: "Fjalla One";
            font-size: 36px;
        }
    </style>
    <?php
            include_once('connects.php');

            $query = "SELECT * FROM `status` ORDER BY id DESC LIMIT 1";
            $check=mysqli_query($con,$query);
            $row=mysqli_num_rows($check);


            if($check == FALSE) {
                echo ".".$row.".";
            }

            while($row=mysqli_fetch_array($check)) {
                echo "
                <div class='card-columns' id='dataCol' style='display: flex; justify-content: center; flex-direction: column; padding-left:50vh; padding-bottom:25vh'>
                    <div class='card' style='max-width: 10rem;' id='tempCol'>
                        <div class='card-body'>
                        <p class='card-title' align='left'>Temperature<p>
                        <p class='card-text statstext'>" . $row['temp'] . "°C</p>";
                    echo "</div>
                    </div>
                    <div class='card ' style='max-width: 10rem;' id='humCol'>
                        <div class='card-body'>
                        <p class='card-title' align='left'>Humidity<p>
                        <p class='card-text statstext'>" . $row['humidity'] . "%</p>";
                    echo "</div>
                    </div>
                    <div class='card ' style='max-width: 10rem;' id='smCol'>
                        <div class='card-body'>
                        <p class='card-title' align='left'>Soil Moisture<p>
                        <p class='card-text statstext'>" . $row['soil_mois'] . "%</p>";
                    echo "</div>
                    </div>
                    <div class='card ' style='max-width: 10rem;' id='leCol'>
                            <div class='card-body'>
                            <p class='card-title' align='left'>Light Exposure<p>
                            <p class='card-text statstext'>" . $row['light_exp'] . "IU</p>";
                    echo "</div>
                    </div>";
            }
    ?>
</form>
