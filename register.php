<?php
    function sanitizeFormUsername($inputText){
        // strip_tags strips all html elements that might be in a string
        // This can stop people inserting their own elements to the page 
        // which can be used to manipulate your site
        $inputText = strip_tags($inputText);
        // replace all spaces with empty string
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        // lowercase entire string then uppercase the first letter
        $inputText = ucfirst(strtolower($inputText));
        return $inputText;
    }

    function sanitizeFormPassword($inputText){
        $inputText = strip_tags($inputText);
        return $inputText;
    }

    // if login button is pressed do something
    if(isset($_POST['loginButton'])){
    }

    if(isset($_POST['registerButton'])){
        // if you see $ means it is variable
        $username = sanitizeFormUsername($_POST['registerUsername']);
        $firstName = sanitizeFormString($_POST['firstName']);
        $lastName = sanitizeFormString($_POST['lastName']);
        $email = sanitizeFormUsername($_POST['email']);
        $emailConfirm = sanitizeFormUsername($_POST['emailConfirm']);
        $password = sanitizeFormPassword($_POST['password']);
        $password2 = sanitizeFormPassword($_POST['password2']);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
                <label for="loginUsername">Username</label>
            <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g. Mohs Akhtar" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
            <input type="text" id="loginPassword" name="loginPassword" placeholder="Your password" required>
            </p>
            <button type="submit" name="loginButton">LOG IN</button>
        </form>


        <form id="registerForm" action="register.php" method="POST">
            <h2>Sign up for an account</h2>
            <p>
                <label for="registerUsername">Username</label>
                <input type="text" id="registerUsername" name="registerUsername" placeholder="e.g. Mohs Akhtar" required>
            </p>
            <p>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="e.g. Mohs" required>
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="e.g. Akhtar" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="e.g. mohs@mail.com" required>
            </p>
            <p>
                <label for="emailConfirm">Email Confirm</label>
                <input type="email" id="emailConfirm" name="emailConfirm" placeholder="e.g. mohs@mail.com" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your password" required>
            </p>
            <p>
                <label for="password2">Password Confirm</label>
                <input type="password" id="password2" name="password2" placeholder="Confirm your password" required>
            </p>
            <button type="submit" name="registerButton">SIGN UP</button>
        </form>
    </div>
</body>
</html>