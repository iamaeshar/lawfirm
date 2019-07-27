<?php

if (isset($_GET['hash']) and $_GET['uid']) {
    extract($_GET, EXTR_SKIP);
    if (md5("*WAMP*".$uid."*WAMP*") == $hash) {
        $sql = "UPDATE `users` SET `verified` = 1 WHERE `_id`=$uid";
        require 'dbconnect.php';
        $result = $conn->query($sql);
        if ($result == true) {
            echo "you have been activated yourself successfully. <a href='../login-to-meet-to-lawyer.html'>click here</a> for login";       
        }
    }
}
header("Location: ./");