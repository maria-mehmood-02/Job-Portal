<?php

    require_once('../conn.php');

    session_start();

    $user_id = '';

    if (isset($_SESSION['email_address'])) {
        # code...
        $email = $_SESSION['email_address'];
        $user_id = "SELECT * FROM `users` WHERE email_address = '$email'";
        $result = mysqli_query($conn, $user_id) or die("Query Failed");
        $data = mysqli_fetch_assoc($result);
        $u_id = $data['user_id'];

        $job_id = $_POST['job_id'];
        
        // echo $u_id;
        // echo $job_id;

        $check = "SELECT * FROM applied_jobs WHERE job_id = $job_id && emp_id = $u_id";
        $result = mysqli_query($conn, $check) or die("Query Failed");

        // echo $check;

        if (mysqli_num_rows($result) == 0) {
            # code...
            $query = "INSERT INTO `applied_jobs`(`job_id`, `emp_id`, `status`) VALUES ($job_id, $u_id, 'Pending')";
            // echo $query;
            $execute = mysqli_query($conn, $query) or die("Query Failed");

            if ($execute) {
                # code...
                echo json_encode(array("success" => 1));
            }
        } else {
            # code...
            echo json_encode(array("duplicate" => 1));
        }
    }
?>