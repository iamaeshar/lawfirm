<?php
    require_once('dbconnect.php');

    $fullyBusyDates = array();
    $sql1 = "SELECT _date FROM appointments GROUP BY _date HAVING COUNT(*) > 1";
    $res1 = $conn->query($sql1);
    if ($res1) {
        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                array_push($fullyBusyDates, $row['_date']);
            }
            $resp['fullyBusyDates'] = $fullyBusyDates;
        }
        $resp['status'] = true;
    }else {
        $resp['status'] = false;
    }

    // $partialBusyDates = array();
    // $sql2 = "SELECT _date FROM appointments GROUP BY _date HAVING COUNT(*) = 1";
    // $res2 = $conn->query($sql2);
    // if ($res2) {
    //     if ($res2->num_rows > 0) {
    //         while ($row = $res2->fetch_assoc()) {
    //             array_push($partialBusyDates, $row['_date']);
    //         }
    //         $resp['partialBusyDates'] = $partialBusyDates; 
    //     }
    // }

    echo json_encode($resp);
