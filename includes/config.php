<?php
    // turns on output buffering
    // waits till all data is complete till sending to server
    ob_start();
    // enable use of sessions
    session_start();

    // sets timezone to london GMT
    // used for when we store times in db
    $timezone = date_default_timezone_set("Europe/London");

    // connect variable for MySQL db
    // "server name", "username", "password", "database name"
    $con = mysqli_connect("localhost", "root", "", "spotify_clone");

    // output err if failed to connect to db
    if(mysqli_connect_errno()){
        echo "Failed to connect: " + mysqli_connect_errno();
    }
?>