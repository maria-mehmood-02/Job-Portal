<?php
    require_once('../conn.php');

    $data['job_id'] = $_POST['jobId'];
    $data['job_title'] = $_POST['jobTitle'];
    $data['job_type'] = $_POST['jobType'];
    $data['location'] = $_POST['location'];
    $data['stipend'] = $_POST['stipend'];
    $data['description'] = $_POST['description'];

    // print_r($data);

    $job_id = $data['job_id'];
    $job_title = $data['job_title'];
    $job_type = $data['job_type'];
    $location = $data['location'];
    $stipend = $data['stipend'];
    $description = $data['description'];

    $query = "UPDATE `jobs` SET `job_title`='$job_title',`job_type`='$job_type',`location`='$location',
                `stipend`='$stipend',`description`='$description' WHERE job_id = $job_id";

    // echo $query;

    $execute = mysqli_query($conn, $query);

    if ($execute) {
        # code...
        echo json_encode(array('success' => 1, 'data' => $data));
    }

?>