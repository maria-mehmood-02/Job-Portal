<?php
    require_once('../conn.php');
    session_start();
    session_unset();
    // unset($_SESSION['email_address']);
    // echo "hello";
    session_destroy();
    echo json_encode(array('success' => 1));
?>