<?php
    include("includes/classes/Account.php");

    $account = new Account();
    // call register function from Account() class
    $account->register();
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");
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