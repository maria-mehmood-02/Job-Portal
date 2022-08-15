<?php
    require_once('../conn.php');

    $query = "SELECT * FROM users WHERE user_type = 'employeer'";
    $execute = mysqli_query($conn, $query) or die("Query Failed");

    if (mysqli_num_rows($execute) > 0) {
        # code...
        $data = array();
        while ($row = mysqli_fetch_assoc($execute)) {
            # code...
            if ($row['status'] == 'Active') {
                # code...
                array_push($data, $row);
            }
        }
        echo json_encode($data);
    }

?>