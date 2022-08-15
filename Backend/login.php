<?php
    require_once('conn.php');

    session_start();

    $data['emailAddress'] = $_POST['emailAddress'];
    $data['password'] = $_POST['password'];

    $emailAddress = $data['emailAddress'];
    $password = $data['password'];

    
    if ($emailAddress === "admin" && $password === "admin") {
        # code...
        // echo $emailAddress;
        // echo $password;
        echo json_encode(array('success' => 1, 'data' => $data, "user_type" => 'admin'));
    } else {
        # code...
        if ($emailAddress != "" && $password != "") {
            # code...
            $query = "SELECT * FROM users WHERE email_address = '$emailAddress' AND password = '$password'";
        
            $result = mysqli_query($conn, $query) or die("Query Failed");
    
            $row = mysqli_fetch_assoc($result);
    
            $u_type = $row['user_type'];
        
            if (mysqli_num_rows($result) > 0) {
                # code...
                $_SESSION['email_address'] = $emailAddress;
                echo json_encode(array('success' => 1, 'data' => $data, "user_type" => $u_type));
            }
        }
    }


    mysqli_close($conn);
    exit;

?>