<?php

    require_once('../conn.php');

    $data['firstName'] = $_POST['firstName'];
    $data['lastName'] = $_POST['lastName'];
    $data['dob'] = $_POST['dob'];
    $data['gender'] = $_POST['gender'];
    $data['email'] = $_POST['email'];
    $data['phoneNumber'] = $_POST['phoneNumber'];
    $data['password'] = $_POST['password'];

    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $dob = $data['dob'];
    $gender = $data['gender'];
    $email = $data['email'];
    $phoneNumber = $data['phoneNumber'];
    $password = $data['password'];

    if ($firstName != "" && $lastName != "" && $dob != "" && $gender != "" && $email != "" && $phoneNumber != "" && $password != "") {
        # code...

        $registered_user = "SELECT `email_address`, `phone_number` FROM `users` WHERE email_address = '$email' OR phone_number = '$phoneNumber'";
        $result = mysqli_query($conn, $registered_user) or die("Query Failed");

        if (mysqli_num_rows($result) > 0) {
            # code...
            echo json_encode(array('success' => 0));
        } else {
            # code...
            $query = "INSERT INTO `users`(`first_name`, `last_name`, `dob`, `gender`, `email_address`, `password`, `phone_number`, `user_type`, `status`) 
                    VALUES ('$firstName','$lastName','$dob','$gender','$email','$password','$phoneNumber','employeer','Pending')";

            $execute = mysqli_query($conn, $query) or die("Query Failed!");
            echo json_encode(array('success' => 1, 'data' => $data));
        }
    }

    mysqli_close($conn);

    exit;
?>