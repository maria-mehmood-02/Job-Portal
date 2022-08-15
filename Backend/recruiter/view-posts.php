<?php
    require_once('../conn.php');

    session_start();


    if (isset($_SESSION['email_address'])) {
        # code...
        $email = $_SESSION['email_address'];

        $rec_id = "SELECT user_id FROM `users` WHERE email_address = '$email'";
        $result = mysqli_query($conn, $rec_id) or die("Query Failed");

        $rec_id = mysqli_fetch_assoc($result);
        $rec_id = $rec_id['user_id'];

        $query = "SELECT job_id, job_title FROM jobs WHERE recruiter_id = $rec_id";
        $execute = mysqli_query($conn, $query) or die("Query Failed");

        if (mysqli_num_rows($execute) > 0) {
            # code...
            $data = array();
            while ($row = mysqli_fetch_assoc($execute)) {
                # code...
                array_push($data, $row);
            }
            // echo mysqli_fetch_assoc($execute);
            echo json_encode($data);
        }
    }

?>