<?php
    require_once('../conn.php');

    $query = "SELECT * FROM contact_us";
    $execute = mysqli_query($conn, $query);

    if (mysqli_num_rows($execute) > 0) {
        # code...
        $data = array();
        while ($row = mysqli_fetch_assoc($execute)) {
            # code...
            array_push($data, $row);
        }
        echo json_encode(array("success" => 1,"data" => $data));
    }

?>