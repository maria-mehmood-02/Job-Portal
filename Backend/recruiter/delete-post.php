<?php
    require_once('../conn.php');

    $j_id = $_POST['id'];

    $query = "DELETE FROM `jobs` WHERE job_id = $j_id";
    $execute = mysqli_query($conn, $query);

    echo json_encode(array("success" => 1));

?>