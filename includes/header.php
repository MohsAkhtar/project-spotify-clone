<?php
    include("includes/config.php");
    // if need to manually log out of session
    //session_destroy();

    // checks if session is set
    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    } else {
        // redirects to register page if session is not started
        header("Location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="mainContainer">
        <div id="topContainer">
            <?php include("includes/navbarContainer.php"); ?>

            <div id="mainViewContainer">
                <div id="mainContent">