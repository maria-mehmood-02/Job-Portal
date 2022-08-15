<?php
    require_once('../conn.php');

    session_start();

    
    if (isset($_SESSION['email_address'])) {
        # code...
        // echo "Email address: " . $_SESSION['email_address'];

        $email = $_SESSION['email_address'];

        $registered_user = "SELECT * FROM `users` WHERE email_address = '$email' and user_type = 'recruiter'";
        $result = mysqli_query($conn, $registered_user) or die("Query Failed");
        $row = mysqli_fetch_assoc($result);
        $u_id = $row['user_id'];
        // echo $u_id;
        // print_r($row);

        $query = "SELECT * FROM recruiter WHERE user_id = $u_id";
        $execute = mysqli_query($conn, $query) or die("Query Failed");
        $company_name = "";
        $experience = "";

        if (mysqli_num_rows($execute) > 0) {
            $data = mysqli_fetch_assoc($execute);
            // $company_name = $data['company_name'];
            // $experience = $data['experience'];
            $row = array_merge($row, $data);  
        }

        echo json_encode(array("success" => 1, "data" => $row));
        // echo json_encode(array('success' => 1, 'data' => $data));
    }

    mysqli_close($conn);
?>