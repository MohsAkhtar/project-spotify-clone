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
            <input type="text" id="loginPassword" name="loginPassword" required>
            </p>
            <button type="submit" name="loginButton">LOG IN</button>
        </form>
    </div>
</body>
</html>