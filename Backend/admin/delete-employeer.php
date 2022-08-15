<?php
    require_once('../conn.php');

    $u_id = $_POST['id'];

    $query = "DELETE FROM `employeer` WHERE user_id = $u_id";
    $execute = mysqli_query($conn, $query);
    
    $emp_query = "DELETE FROM `users` WHERE user_id = $u_id";
    $execute = mysqli_query($conn, $emp_query);

    echo json_encode(array("success" => 1));

?>