<?php
    require_once('conn.php');

    $name = $_POST['name'];
    $email_address = $_POST['email_address'];
    $msg_type = $_POST['msg_type'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    
    // echo $name;
    // echo $email_address;
    // echo $msg_type;
    // echo $subject;
    // echo $msg;

    $query = "INSERT INTO `contact_us`(`name`, `email_address`, `msg_type`, `subject`, `msg`) 
                VALUES ('$name', '$email_address', '$msg_type', '$subject', '$msg')";

    $execute = mysqli_query($conn, $query) or die ("Query Failed");

    if ($execute) {
        # code...
        echo json_encode(array("success" => 1));
    } else {
        echo json_encode(array("success" => 0));
    }

?>