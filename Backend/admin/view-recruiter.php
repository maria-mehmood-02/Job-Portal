<?php
    require_once('../conn.php');

    $query = "SELECT * FROM users WHERE user_type = 'recruiter'";
    $execute = mysqli_query($conn, $query) or die("Query Failed");
    
    
    if (mysqli_num_rows($execute) > 0) {
        # code...
        $data = array();
        while ($row = mysqli_fetch_assoc($execute)) {
            if ($row['status'] == 'Active') {
                # code...
                $u_id = $row['user_id'];
                $rec_query = "SELECT * FROM recruiter WHERE user_id = $u_id";
                // echo $rec_query;
                $result = mysqli_query($conn, $rec_query) or die("Query Failed");
    
                $rec_data = mysqli_fetch_assoc($result);
                
                $row = array_merge($row, $rec_data);
                # code...
                array_push($data, $row);
            }
        }
    }
    echo json_encode($data);

?>