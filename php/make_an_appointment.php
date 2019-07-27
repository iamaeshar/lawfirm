<?php
    require_once('dbconnect.php');
    $time_slot = $_POST['time_slot'];
    $related_to = $_POST['related_to'];
    $case_query = $_POST['case_query'];

    session_start();
    $user_id = $_SESSION['user_id'];

    /* Changing Date Format DD-MM-YYYY to YYYY-MM-DD */
    $date_of_appointment = explode("-", $_POST['date_of_appointment']);
    $date_of_appointment = $date_of_appointment[2]."-".$date_of_appointment[1]."-".$date_of_appointment[0];

    $sql = "INSERT INTO appointments(_date, time_slot, related_to, case_query, _status, user_id) values('$date_of_appointment', $time_slot, '$related_to', '$case_query', 0, $user_id)";

    if ($conn->query($sql)) {
        $appointment_id =  $conn->insert_id;
        $ticket = strtoupper(substr(md5(substr(time(), 6)), 0, 8));

        $sql2 = "INSERT INTO tickets(ticket, appointment_id) VALUES('$ticket', $appointment_id)";
        if ($conn->query($sql2)) {
            $resp['status'] = true;
            $resp['ticket'] = $ticket;
        }
    } else {
        $resp['status'] = false;
    }

    echo json_encode($resp);
