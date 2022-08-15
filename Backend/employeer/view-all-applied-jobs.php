<?php
    require_once('../conn.php');

    session_start();

    
    if (isset($_SESSION['email_address'])) {
        # code...

        $email = $_SESSION['email_address'];
        $user_id = "SELECT * FROM `users` WHERE email_address = '$email'";
        $result = mysqli_query($conn, $user_id) or die("Query Failed");
        $data = mysqli_fetch_assoc($result);
        $u_id = $data['user_id'];

        $query = "SELECT * FROM applied_jobs WHERE emp_id = $u_id";
        $execute = mysqli_query($conn, $query) or die("Query Failed");

        if (mysqli_num_rows($execute) > 0) {
            # code...
            $data_id = array();
            while ($row = mysqli_fetch_assoc($execute)) {
                # code...
                array_push($data_id, $row);
            }
            // print_r($data_id);
            // $i = 0;
            // print_r($data_id[$i]);
            // print_r($data_id[$i]['job_id']);
            // echo sizeof($data_id);

            $data = array();

            for ($i=0; $i < sizeof($data_id); $i++) { 
                # code...
                $id = $data_id[$i]['job_id'];
                $job = "SELECT * FROM jobs WHERE job_id = $id";
                // echo $job;
                $result_query = mysqli_query($conn, $job);
                array_push($data, mysqli_fetch_assoc($result_query));
            }
            echo json_encode(array("success" => 1, "data" => $data));
        }
    }

    mysqli_close($conn);
?>