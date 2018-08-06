<?php
class Constants{
    // static means you do not need to create an instance of the class
    // REGISTER MESSAGES
    public static $passwordsNotMatch = "Your passwords do not match";
    public static $passwordNotAlphanumeric = "Your password can only contain letters and numbers";
    public static $passwordNotValidLength = "Your password has to be between 5 and 30 characters";
    public static $emailsNotMatch = "Your emails do not match";
    public static $emailNotValid = "Your email is not valid";
    public static $usernameNotValidLength = "Your username has to be between 5 and 25 characters";
    public static $firstNameNotValidLength = "Your first name has to be between 2 and 25 characters";
    public static $lastNameNotValidLength = "Your last name has to be between 2 and 25 characters";
    public static $usernameAlreadyExists = "This username has already been taken";
    public static $emailAlreadyExists = "This email has already been taken";

    // LOGIN FAILED
    public static $loginFailed = "The username or password is incorrect";
}
?>