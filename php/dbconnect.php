<?php
    $server = '';

    /* For Local */
    $user = 'root';
    $password = '';
    $db = 'haqassociates_db';

    /* For Remote */
    // $user = '';
    // $password = '';
    // $db = '';

    $conn = new mysqli($server, $user, $password, $db);

    if(!$conn) {
        return;
    }