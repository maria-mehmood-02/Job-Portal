<?php

    require_once('../conn.php');

    // $id = 3;

    $url = $_SERVER['HTTP_REFERER'];
    $str = explode("?",$url);
    $str = $str[1];
    $id = explode("=",$str);
    $id = $id[1];
    
    $query = "SELECT * from jobs WHERE job_id = $id";
    $execute = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($execute);

    if ($data) {
        # code...
        echo json_encode(array("success" => 1, "data" => $data));
    }

    /***********************/
    
    // $data = array();

    // while ($row = mysqli_fetch_assoc($execute)) {
    //     # code...
    //     array_push($data, $row);
    // }

    // echo json_encode(array("data" => $data));

?>