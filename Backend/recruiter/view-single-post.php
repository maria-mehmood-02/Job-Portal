<?php
    require_once('../conn.php');

    $j_id = $_POST['id'];

    // $data['job_id'] = $j_id;

    $query = "SELECT * from jobs WHERE job_id = $j_id";
    $execute = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($execute);

    if ($data) {
        # code...
        echo json_encode(array("success" => 1, "data" => $data));
    }


?>