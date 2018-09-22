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
            <div id="navBarContainer">
                <nav class="navBar">
                    <a href="index.php" class="logo">
                        <img src="assets/images/icons/logo.png" alt="">
                    </a>
                    <div class="group">
                        <div class="navItem">
                            <a href="search.php" class="navItemLink">Search</a>
                        </div>
                    </div>
                    <div class="group">
                        <div class="navItem">
                            <a href="browse.php" class="navItemLink">Browse</a>
                        </div>
                        <div class="navItem">
                            <a href="yourMusic.php" class="navItemLink">Your Music</a>
                        </div>
                        <div class="navItem">
                            <a href="profile.php" class="navItemLink">Mohs Akhtar</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div id="nowPlayingBarContainer">
            <div id="nowPlayingBar">
                <div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img src="https://images.unsplash.com/photo-1537457661141-6ff848806272?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=950549254131e1ed42c694e2b6d436e8&auto=format&fit=crop&w=701&q=80" class="albumArtwork" alt="">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                <span>All hail Ye</span>
                            </span>
                            <span class="artistName">
                                <span>Kanye West</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingCentre">
                    <div class="content playerControls">
                        <div class="buttons">
                            <button class="controlButton shuffle" title="shuffle button">
                                <img src="assets/images/icons/shuffle.png" alt="shuffle">
                            </button>
                            <button class="controlButton previous" title="previous button">
                                <img src="assets/images/icons/previous.png" alt="previous">
                            </button>
                            <button class="controlButton play" title="play button">
                                <img src="assets/images/icons/play.png" alt="play">
                            </button>
                            <button class="controlButton pause" title="pause button" style="display: none">
                                <img src="assets/images/icons/pause.png" alt="pause">
                            </button>
                            <button class="controlButton next" title="next button">
                                <img src="assets/images/icons/next.png" alt="next">
                            </button>
                            <button class="controlButton repeat" title="repeat button">
                                <img src="assets/images/icons/repeat.png" alt="repeat">
                            </button>
                        </div>
                        <div class="playbackBar">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
                    </div>
                </div>
                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="volume button">
                            <img src="assets/images/icons/volume.png" alt="volume">
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>

</html>