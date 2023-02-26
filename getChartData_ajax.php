<?php
    include_once('connects.php');

    $query = "(SELECT `timestamp`,`temp` FROM `status` ORDER BY id DESC) ORDER BY id";
    $result = $con->query($query);
    $check=mysqli_query($con,$query);
    $data = array();

    while ($row = $result->fetch_assoc())
    {
        $rowarray = [];

        $rowarray['x'] = $row['timestamp'];
        $rowarray['y'] = $row['temp'];

        $data[]=$rowarray;
    }
    echo json_encode($data, JSON_NUMERIC_CHECK);

?>