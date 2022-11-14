<?php
require("../connect/connection.php");

// Gets data from URL parameters.



function get_saved_locations(){
    $post_id=$_GET['post_id'];
    $con=mysqli_connect ("localhost", 'root', '','db_kapadyak');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"select lng,lat from post where post_id = $post_id ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}



   
   

?>