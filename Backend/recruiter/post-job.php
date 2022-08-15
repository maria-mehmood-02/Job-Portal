<?php
    require_once('../conn.php');

    session_start();

    $data['job_title'] = $_POST['jobTitle'];
    $data['job_type'] = $_POST['jobType'];
    $data['location'] = $_POST['location'];
    $data['stipend'] = $_POST['stipend'];
    $data['description'] = $_POST['description'];

    $job_title = $data['job_title'];
    $job_type = $data['job_type'];
    $location = $data['location'];
    $stipend = $data['stipend'];
    $description = $data['description'];

    // echo $job_title;
    // echo $job_type;
    // echo $location;
    // echo $stipend;
    // echo $description;

    $email = $_SESSION['email_address'];

    $query_id = "SELECT user_id FROM users WHERE email_address = '$email'";
    $result = mysqli_query($conn, $query_id);

    $rec_id = mysqli_fetch_assoc($result);
    $rec_id = $rec_id['user_id'];

    // echo $rec_id;

    if ($job_title != '' && $job_type != '' && $location != '' && $stipend != '' && $description != '') {
        # code...
        $query = "INSERT INTO `jobs`(`job_title`,`recruiter_id`, `job_type`, `location`, `stipend`, `description`) 
                    VALUES ('$job_title', $rec_id, '$job_type', '$location', '$stipend', '$description')";
    
        $execute = mysqli_query($conn, $query);
    
        if ($execute) {
            # code...
            echo json_encode(array('success' => 1, 'data' => $data));
        }
    }


?>