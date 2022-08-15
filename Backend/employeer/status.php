<?php

    require_once('../conn.php');

    session_start();

    if (isset($_SESSION['email_address'])) {
        # code...
        $url = $_SERVER['HTTP_REFERER'];
        $str = explode("?",$url);
        $str = $str[1];
        $id = explode("=",$str);
        $id = $id[1];

        // echo $id;

        $email = $_SESSION['email_address'];
        $user_id = "SELECT * FROM `users` WHERE email_address = '$email'";
        $result = mysqli_query($conn, $user_id) or die("Query Failed");
        $data = mysqli_fetch_assoc($result);
        $u_id = $data['user_id'];

        $query = "SELECT * FROM applied_jobs WHERE job_id = $id && emp_id = $u_id";
        $execute = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($execute);
        $data = $data['status'];

        if ($data) {
            # code...
            echo json_encode(array("success" => 1, "data" => $data));
        }
    }

?>