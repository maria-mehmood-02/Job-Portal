<?php

    require_once('../conn.php');

    $u_id = $_POST['id'];

    $query_mail = "SELECT email_address FROM users WHERE user_id = $u_id";
    $result = mysqli_query($conn, $query_mail) or die("Query Failed!");

    $sub = "Confirmation E-mail";
    $msg = "Congratulations! Your account is successfully approved!";
    $rec = mysqli_fetch_assoc($result);
    $rec = $rec['email_address'];
    
    $retval = mail($rec,$sub,$msg);
    
    if( $retval == true ) {
        $msg = "Message sent successfully...";
        $query = "UPDATE `users` SET `status`='Active' WHERE user_id = $u_id";
        $execute = mysqli_query($conn, $query) or die("Query Failed!");
        echo json_encode(array("success" => 1, "message" => $msg));
    }else {
        $msg = "Message could not be sent...";
        echo json_encode(array("success" => 0, "message" => $msg));
    }
    
?> 