<?php
    require_once('dbconnect.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = array();

    $sql = "SELECT _id, name, email, mobile, verified from users WHERE email = '$email' AND password= '$password'";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['verified'] == 1) {
                $resp['status'] = true;
                $resp['verified'] = true;

                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $row['_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['mobile'] = $row['mobile'];

            } else {
                $resp['status'] = true;
                $resp['verified'] = false;
                $resp['message'] = 'You have signed up earlier but have not verify yet. Please check your email. If you have not verification link. Send it again click here';
            }
        } else {
            $resp['status'] = false;
            $resp['message'] = 'Email ID and password mismatch';
        }
    } else {
        $resp['status'] = false;
        $resp['message'] = 'Something Went Wrong. Please try after sometime.';
    }

    echo json_encode($resp);
