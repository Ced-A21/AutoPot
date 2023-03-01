<?php
    include_once('connects.php');
    $post_results = $_POST['data'];
    $query = "(SELECT `timestamp`,`temp` FROM `status` ORDER BY id DESC) ORDER BY id";
    $result = $con->query($query);
    $check=mysqli_query($con,$query);
    $data = array();
    $name = "temp";

    if ($post_results == 'temp')
    {
        $query = "(SELECT `timestamp`,`temp` FROM `status` ORDER BY id DESC) ORDER BY id";
        $result = $con->query($query);
        $check=mysqli_query($con,$query);
        $data = array();
        $name = "temp";
    }

    elseif ($post_results == 'hum')
    {
        $query = "(SELECT `timestamp`,`humidity` FROM `status` ORDER BY id DESC) ORDER BY id";
        $result = $con->query($query);
        $check=mysqli_query($con,$query);
        $data = array();
        $name = "humidity";
    }

    elseif ($post_results == 'soil')
    {
        $query = "(SELECT `timestamp`,`soil_mois` FROM `status` ORDER BY id DESC) ORDER BY id";
        $result = $con->query($query);
        $check=mysqli_query($con,$query);
        $data = array();
        $name = "soil_mois";
    }

    while ($row = $result->fetch_assoc())
    {
        $rowarray = [];

        $rowarray['x'] = $row['timestamp'];
        $rowarray['y'] = $row[$name];

        $data[]=$rowarray;
    }
    echo json_encode($data, JSON_NUMERIC_CHECK);

?>