<?php

    require_once('../conn.php');

    $job_id = $_POST['job_id'];
    $emp_id = $_POST['emp_id'];

    $query = "UPDATE `applied_jobs` SET `status`='Accepted' WHERE job_id = $job_id && emp_id = $emp_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        # code...
        echo json_encode(array("success" => 1));
    }

?>