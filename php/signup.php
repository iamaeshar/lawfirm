<?php
    require_once('dbconnect.php');

    $name = $_POST['name'];
    $mob_number = $_POST['mob_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name, mobile, email, password, verified) values('$name', '$mob_number', '$email', '$password', 0)";

    if ($conn->query($sql)) {
        $uid = $conn->insert_id;
        $hash = md5("*WAMP*".$uid."*WAMP*");
        $url = "https://a2zinterior.in/lawfirm/php/activate.php?hash=$hash&uid=$uid";
        
        $sub = "Activate yourself.";
        include('get_mail_layout.php');
        $mailmsg =  getMailLayout("<a href='$url'>Click here</a> to activate your self. <br /> OR <br /> copy the following link and open it in any internet browser. <br /> $url");

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($email, $sub, $mailmsg, $headers);
        
        $resp['status'] = true;
        $resp['message'] = 'Thank you for signup. We have sent an verification link to your registered email. Please verify yourself by clicking on link';
    } else {
        $resp['status'] = false;
        $resp['message'] = 'Something Went Wrong. Please try after sometime.';
    }

    echo json_encode($resp);
?>

