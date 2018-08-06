<?php
    // if login button is pressed do something
    if(isset($_POST['loginButton'])){
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        $wasSuccessful = $account->login($username, $password);

        if($wasSuccessful){
            header("Location: index.php");
        }
    }
?>