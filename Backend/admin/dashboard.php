<?php
    require_once('../conn.php');

    $users = "SELECT * FROM users";
    $user_result = mysqli_query($conn, $users);
    
    $emp = "SELECT * FROM users WHERE user_type = 'employeer'";
    $emp_result = mysqli_query($conn, $emp);
    
    $rec = "SELECT * FROM users WHERE user_type = 'employeer'";
    $rec_result = mysqli_query($conn, $rec);
    
    $accepted = "SELECT * FROM applied_jobs WHERE status = 'Accepted'";
    $accepted_result = mysqli_query($conn, $accepted);
    
    $rejected = "SELECT * FROM applied_jobs WHERE status = 'Rejected'";
    $rejected_result = mysqli_query($conn, $rejected);
    
    $pending = "SELECT * FROM applied_jobs WHERE status = 'Pending'";
    $pending_result = mysqli_query($conn, $pending);

    echo json_encode(array("success" => 1, "total_users" => mysqli_num_rows($user_result), 
                            "total_emps" => mysqli_num_rows($emp_result), 
                            "total_rec" => mysqli_num_rows($rec_result),
                            "accepted" => mysqli_num_rows($accepted_result),
                            "rejected" => mysqli_num_rows($rejected_result),
                            "pending" => mysqli_num_rows($pending_result)));

?>