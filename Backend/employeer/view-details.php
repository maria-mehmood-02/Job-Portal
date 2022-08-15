<?php

    require_once('../conn.php');

    $url = $_SERVER['HTTP_REFERER'];
    $str = explode("?",$url);
    $str = $str[1];
    $id = explode("=",$str);
    $id = $id[1];

    // echo $id;

    $query = "SELECT * FROM jobs WHERE job_id = $id";
    $execute = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($execute);

    if ($data) {
        # code...
        echo json_encode(array("success" => 1, "data" => $data));
    }

?>