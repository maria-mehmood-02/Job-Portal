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
        $company_name = $_POST['rec-companyName'];
        $experience = $_POST['experience'];

        // echo "firstName " . $firstName;
        // echo " lastName " . $lastName;
        // echo " dob " . $dob;
        // echo " gender " . $gender;
        // echo " company_name " . $company_name;
        // echo " experience " . $experience;


        if ($firstName != $data['first_name'] || $lastName != $data['last_name'] || $dob != $data['dob'] || $gender != $data['gender']) {
            # code...
            // echo "Changed";
            $query = "UPDATE `users` SET `first_name`='$firstName',`last_name`='$lastName',`dob`='$dob',`gender`='$gender' WHERE `email_address` = '$email'";
            $result = mysqli_query($conn, $query) or die("Query Failed");

        }

        $query = "SELECT * FROM recruiter WHERE user_id = $u_id";
        $execute = mysqli_query($conn, $query) or die("Query Failed");
        // echo $query;

        if (mysqli_num_rows($execute) == 0) {
            # code...
            $query = "INSERT INTO `recruiter`(`user_id`, `company_name`, `experience`) VALUES ($u_id, '$company_name', '$experience')";
            $result = mysqli_query($conn, $query) or die("Query Failed");
            echo json_encode(array("sucess" => 1));
        } else {
            # code...
            $query = "UPDATE `recruiter` SET `company_name` = '$company_name', `experience` = $experience WHERE user_id = $u_id";
            $result = mysqli_query($conn, $query) or die("Query Failed");
            echo json_encode(array("sucess" => 1));
        }

    }

    mysqli_close($conn);
?>