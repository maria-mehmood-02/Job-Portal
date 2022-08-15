<?php

    require_once('../conn.php');

    $url = $_SERVER['HTTP_REFERER'];
    $str = explode("?",$url);
    $str = $str[1];
    $id = explode("=",$str);
    $id = $id[1];

    $query = "SELECT * FROM applied_jobs WHERE job_id = $id && status = 'Accepted'";
    $execute = mysqli_query($conn, $query);

    if (mysqli_num_rows($execute) > 0) {

        # code...

        $data_id = array();
        while ($row = mysqli_fetch_assoc($execute)) {
            # code...
            array_push($data_id, $row);
        }

        // print_r($data_id);

        $name_arr = array();
        $resume_arr = array();
        $id_arr = array();

        for ($i=0; $i < sizeof($data_id); $i++) { 
            # code...
            $emp_id = $data_id[$i]['emp_id'];

            $emp = "SELECT * FROM users WHERE user_id = $emp_id";
            $result_query = mysqli_query($conn, $emp);

            $name = mysqli_fetch_assoc($result_query);
            
            $name = $name['first_name'] . ' ' . $name['last_name'];
            
            array_push($name_arr, $name);
            
            $resume_query = "SELECT * FROM employeer WHERE user_id = $emp_id";
            $result = mysqli_query($conn, $resume_query);

            
            $resume = mysqli_fetch_assoc($result);
            
            $resume = $resume['resume'];
            
            array_push($resume_arr, $resume);
            array_push($id_arr, $emp_id);
        }
        echo json_encode(array("success" => 1,"emp_id" => $id_arr ,"name_arr" => $name_arr, "resume_arr" => $resume_arr));
    }

?>