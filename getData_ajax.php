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


            $imgURL = 'Images/Photo9.jpg';


            if($check == FALSE) {
                echo ".".$row.".";
            }

            while($row=mysqli_fetch_array($check)) {

                if ($row['temp'] < '30'){
                    $imgURL = 'Images/sample4.png';
                }

                echo "
                <div class='card-columns' id='dataCol' style='display: flex; justify-content: center; flex-direction: column; padding-left:60vh; padding-bottom:25vh; background-image:url($imgURL);'>
                    <div class='card' style='max-width: 12rem;' id='tempCol'>
                        <div class='card-body' id='card1'>
                        <p class='card-title' align='left'>Temperature<p>
                        <p class='card-text statstext'>" . $row['temp'] . "°C</p>";
                    echo "</div>
                    </div>
                    <div class='card ' style='max-width: 12rem;' id='humCol'>
                        <div class='card-body' id='card2'>
                        <p class='card-title' align='left'>Humidity<p>
                        <p class='card-text statstext'>" . $row['humidity'] . "%</p>";
                    echo "</div>
                    </div>
                    <div class='card ' style='max-width: 12rem;' id='smCol'>
                        <div class='card-body' id='card3'>
                        <p class='card-title' align='left'>Soil Moisture<p>
                        <p class='card-text statstext'>" . $row['soil_mois'] . "%</p>";
                    echo "</div>
                    </div>
                    <div class='card ' style='max-width: 12rem;' id='leCol'>
                            <div class='card-body' id='card4'>
                            <p class='card-title' align='left'>Light Exposure<p>
                            <p class='card-text statstext'>" . $row['light_exp'] . "IU</p>";
                    echo "</div>
                    </div>";
            }
    ?>
</form>
