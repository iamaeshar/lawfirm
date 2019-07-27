<?php
    require_once('dbconnect.php'); 

    /* Changing Date Format DD-MM-YYYY to YYYY-MM-DD */
    $selectedDate = explode("-", $_POST['selectedDate']);
    $selectedDate = $selectedDate[2]."-".$selectedDate[1]."-".$selectedDate[0];

    $sql = "SELECT time_slot from appointments WHERE _date = '$selectedDate'";
    $res = $conn->query($sql);
    if($res){
        if($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                $freeSlots = $row['time_slot'];
            }
            $resp['data'] = $freeSlots;
        }else {
            $resp['data'] = 'Dono Free hai';
        }
        $resp['status'] = true;
    }else {
        $resp['status'] = false;
    }

    echo json_encode($resp);


