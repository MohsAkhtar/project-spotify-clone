<?php
    // When you 'include' you are basically copying the code and pasting here
    // so order matters
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con);

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    // function to remember what user has input
    // will only take value if it has been set
    function getInputValue($name){
        if(isset($_POST[$name])){
            echo ($_POST[$name]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the Spotify Clone!</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <?php
    // added this php so when register or login button is pressed the correct
    // form displays. Wee've done this in php as js can't tell if a php button
    // has been pressed
        if(isset($_POST['registerButton'])){
            // printing out this script if register button is pressed
            echo '<script>
            $(document).ready(function() {
                $("#registerForm").show();
                $("#loginForm").hide();
            }
            </script>';
        } else {
            // printing out this script if login button is pressed
            echo '<script>
            $(document).ready(function() {
                $("#loginForm").show();
                $("#registerForm").hide();
            }
            </script>';
        }
    ?>


    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                    <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g. Mohs Akhtar" value="<?php getInputValue('loginUsername') ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" name="loginPassword" placeholder="Your password" required>
                    </p>
                    <button type="submit" name="loginButton">LOG IN</button>

                    <div class="hasAccountText">
                        <div id="hideLogin"><span>Don't have an account yet? Signup here.</span></div>
                    </div>
                </form>


                <form id="registerForm" action="register.php" method="POST">
                    <h2>Sign up for an account</h2>
                    <p>
                        <?php 
                            echo $account->getError(Constants::$usernameNotValidLength);
                            echo $account->getError(Constants::$usernameAlreadyExists);
                        ?>
                        <label for="registerUsername">Username</label>
                        <input type="text" id="registerUsername" name="registerUsername" 
                        placeholder="e.g. Mohs Akhtar" value = "<?php getInputValue('registerUsername') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameNotValidLength); ?>
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" 
                        placeholder="e.g. Mohs" value = "<?php getInputValue('firstName') ?>"required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameNotValidLength); ?>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" 
                        placeholder="e.g. Akhtar" value = "<?php getInputValue('lastName') ?>" required>
                    </p>
                    <p>
                        <?php 
                            echo $account->getError(Constants::$emailsNotMatch); 
                            echo $account->getError(Constants::$emailNotValid);
                            echo $account->getError(Constants::$emailAlreadyExists); 
                        ?>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" 
                        placeholder="e.g. mohs@mail.com" value = "<?php getInputValue('email') ?>" required>
                    </p>
                    <p>
                        <label for="emailConfirm">Email Confirm</label>
                        <input type="email" id="emailConfirm" name="emailConfirm" 
                        placeholder="e.g. mohs@mail.com" value = "<?php getInputValue('emailConfirm') ?>" required>
                    </p>
                    <p>
                        <?php 
                            echo $account->getError(Constants::$passwordsNotMatch); 
                            echo $account->getError(Constants::$passwordNotAlphanumeric); 
                            echo $account->getError(Constants::$passwordNotValidLength); 
                        ?>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Your password" required>
                    </p>
                    <p>
                        <label for="password2">Password Confirm</label>
                        <input type="password" id="password2" name="password2" placeholder="Confirm your password" required>
                    </p>
                    <button type="submit" name="registerButton">SIGN UP</button>

                    <div class="hasAccountText">
                        <div id="hideRegister"><span>Already have an account? Log in here.</span></div>
                    </div>
                </form>
            </div>
            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>
        </div>     
    </div>  
</body>
</html>