<?php
    require_once('../conn.php');

    session_start();

    
    if (isset($_SESSION['email_address'])) {
        # code...

        $query = "SELECT * FROM `jobs` WHERE job_title LIKE '%".$_GET['type']."%';";
        $execute = mysqli_query($conn, $query) or die("Query Failed");

        if (mysqli_num_rows($execute) > 0) {
            # code...
            $data = array();
            while ($row = mysqli_fetch_assoc($execute)) {
                # code...
                array_push($data, $row);
            }
            echo json_encode(array("success" => 1, "data" => $data));
        }
    }

    mysqli_close($conn);
?>