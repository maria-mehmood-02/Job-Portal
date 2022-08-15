<?php
    require_once('../conn.php');

    session_start();

    $user_id = '';

    if (isset($_SESSION['email_address'])) {
        # code...
        $email = $_SESSION['email_address'];
        $user_id = "SELECT * FROM `users` WHERE email_address = '$email'";
        $result = mysqli_query($conn, $user_id) or die("Query Failed");
        $data = mysqli_fetch_assoc($result);
        $u_id = $data['user_id'];

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        // echo "firstName " . $firstName;
        // echo " lastName " . $lastName;
        // echo " dob " . $dob;
        // echo " gender " . $gender;

        // echo "firstName " . $firstName . " and " . $data['first_name'];
        // echo "lastName " . $lastName . " and " . $data['last_name'];
        // echo "dob " . $dob . " and " . $data['dob'];
        // echo "gender " . $gender . " and " . $data['gender'];


        if ($firstName != $data['first_name'] || $lastName != $data['last_name'] || $dob != $data['dob'] || $gender != $data['gender']) {
            # code...
            // echo "Changed";
            $query = "UPDATE `users` SET `first_name`='$firstName',`last_name`='$lastName',`dob`='$dob',`gender`='$gender' WHERE `email_address` = '$email'";
            $result = mysqli_query($conn, $query) or die("Query Failed");

        }

        $query = "SELECT * FROM employeer WHERE user_id = $u_id";
        $execute = mysqli_query($conn, $query) or die("Query Failed");

        if (mysqli_num_rows($execute) == 0) {
            # code...
            if (isset($_FILES['resume'])) 
            {
                $resume = $_FILES['resume']['name'];    
                $file_size = $_FILES['resume']['size'];    
                $file_tmp = $_FILES['resume']['tmp_name'];     
                $file_type = $_FILES['resume']['type'];    
                
                
                $path = "../../Resume/".$resume;
                
                if (move_uploaded_file($file_tmp ,$path)) {
                    # code...
                    $query = "INSERT INTO `employeer`(`user_id`, `resume`) VALUES ($u_id, '$resume')";
                    $result = mysqli_query($conn, $query) or die("Query Failed");
                    echo json_encode(array("sucess" => 1));
                }

            }
        } else {
            # code...
            if (isset($_FILES['resume'])) 
            {
                $resume = $_FILES['resume']['name'];    
                $file_size = $_FILES['resume']['size'];    
                $file_tmp = $_FILES['resume']['tmp_name'];     
                $file_type = $_FILES['resume']['type'];    
                
                
                $path = "../../Resume/".$resume;
                
                if (move_uploaded_file($file_tmp ,$path)) {
                    # code...
                    $query = "UPDATE `employeer` SET `resume`='$resume' WHERE user_id = $u_id";
                    $result = mysqli_query($conn, $query) or die("Query Failed");
                    echo json_encode(array("sucess" => 1));
                }

            }
        }

    }

    mysqli_close($conn);
?>