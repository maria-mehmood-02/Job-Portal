<?php
    require_once('../conn.php');

    $u_id = $_POST['id'];

    $query = "SELECT * FROM users WHERE user_id = $u_id";
    $execute = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($execute);

    if ($row['user_type'] == 'employeer') {
        # code...
        $rec_query = "SELECT * FROM employeer WHERE user_id = $u_id";

        $result = mysqli_query($conn, $rec_query) or die("Query Failed");

        $rec_data = mysqli_fetch_assoc($result);

        if ($rec_data) {
            # code...
            $row = array_merge($row, $rec_data);
        }
        echo json_encode(array("success" => 1, "data" => $row, "user_type" => $row['user_type']));

    } elseif ($row['user_type'] == 'recruiter') {
        # code...
        $rec_query = "SELECT * FROM recruiter WHERE user_id = $u_id";

        $result = mysqli_query($conn, $rec_query) or die("Query Failed");

        $rec_data = mysqli_fetch_assoc($result);
        
        if ($row) {
            # code...
            $row = array_merge($row, $rec_data);
        }
        
        echo json_encode(array("success" => 1, "data" => $row, "user_type" => $row['user_type']));
    }

    // echo json_encode(array("success" => 1, "data" => $row, "resume" => $resume));
    // echo json_encode($row);

?>