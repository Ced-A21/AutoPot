
<?php
    include_once('connects.php');

    $query = "SELECT * FROM `status` ORDER BY id DESC LIMIT 1";
    $check=mysqli_query($con,$query);
    $row=mysqli_num_rows($check);

    while($row=mysqli_fetch_array($check)) {

        if (($row['temp'] > '38' || $row['temp'] < '10') || $row['soil_mois'] > "1000"){
            $imgURL = 'Images/sample4.png';
        }
        else if(($row['temp'] > '35' || $row['temp'] < '20') || $row['soil_mois'] > "700"){
            $imgURL = 'Images/sample2.png';
        }
        else{
            $imgURL = 'Images/sample1.png';
        }
    }

    echo $imgURL;

?>
