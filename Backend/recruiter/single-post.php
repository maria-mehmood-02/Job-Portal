<?php
    require_once('../conn.php');

    $j_id = $_POST['id'];

    $query = "SELECT * FROM jobs WHERE job_id = $j_id";
    $execute = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($execute);

    if ($result) {
        # code...
        echo json_encode(array("success" => 1, "data" => $result));
    }
?>