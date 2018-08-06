<?php
    // Typically class names start with a capital as their file name
    class Account{
        private $con;
        private $errorArray;

        // constructor is something thats called as soon as class initialises
        // or variable of this class is created
        public function __construct($con){
            $this->con = $con;
            $this->errorArray = array();
        }

        // public means you can manually call it from other files
        // it can access the private functions in the class its in
        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){ 
            // $this means this instance of the class   
            $this->validateUsername($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmail($em, $em2);
            $this->validatePassword($pw, $pw2);

            // checks if any values are in errorArray
            if(empty($this->errorArray)){
                // if true insert values into db
                return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
            } else {
                // means a validation condition failed
                return false;
            }
        }

        // checks to see if we have had any errors
        public function getError($error){
            // checks if given parameter exists in the array
            if(!in_array($error, $this->errorArray)){
                // if it does not exist in array
                $error = "";
            }
            // returning a span
            return "<span class='errorMessage'>$error</span>";
        }

        // function that inserts user into db
        private function insertUserDetails($un, $fn, $ln, $em, $pw){
            // encrypt the password with md5 method
            // simple way to start with enryption
            $encryptedPw = md5($pw);
            // links to profile pic folder
            $profilePic = "assets/images/profile-pics/head-emarald.png";
            $date = date("Y-m-d");

            // have to make sure 'this' is used so it knows we're talking
            // about this instance of the class
            // have to have single quotes around variables
            $result = mysqli_query($this->con, "INSERT INTO users VALUES 
            ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");

            return $result;
        }

        // private means these can only be called from within this class
        private function validateUsername($usernameText){
            // Checks length of username is valid
            if(strlen($usernameText)> 25 || strlen($usernameText) < 5){
                // if not valid put this message in error array
                // access Constants with 'Constants::'
                // '::' is like the '->'
                // you use double colon for when you don't have instance of class
                // you use arrow when you do
                array_push($this->errorArray, Constants::$usernameNotValidLength);
                // to stop execution of function'return'. ends function
                return;
            }

            // check username exists
            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE
            username = '$usernameText'");
            // check if that query brings up a row in the db
            if(mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameAlreadyExists);
                return;
            }
        }
    
        private function validateFirstName($firstNameText){
            if(strlen($firstNameText)> 25 || strlen($firstNameText) < 2){
                array_push($this->errorArray, Constants::$firstNameNotValidLength);
                return;
            }
        }
    
        private function validateLastName($lastNameText){
            if(strlen($lastNameText)> 25 || strlen($lastNameText) < 2){
                array_push($this->errorArray,  Constants::$lastNameNotValidLength);
                return;
            }
        }
    
        private function validateEmail($emailText, $emailConfirmText){
            if($emailText != $emailConfirmText){
                array_push($this->errorArray, Constants::$emailsNotMatch);
                return;
            }

            /* if not '!'
            // checks if email is in correct format
            // Need this check as HTML allows you to enter anything afer
            // '@' and thinks its valid */
            if(!filter_var($emailText, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailNotValid);
                return;
            }

            // Don't need to repeat this code for emailConfirm as the first check won't
            // be valid if the two emails are not the same anyway
            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE
            email = '$emailText'");
            // check if that query brings up a row in the db
            if(mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailAlreadyExists);
                return;
            }
        }
    
        private function validatePassword($passwordText, $passwordConfirmText){
            if($passwordText != $passwordConfirmText){
                array_push($this->errorArray, Constants::$passwordsNotMatch);
                return;
            }

            // Check if alphanumeric and numbers are used for pwd
            // So we are going through A-Z a-z 0-9 pattern
            // '^' means not
            // So checking if character is not in the pattern
            if(preg_match('/[^A-Za-z0-9]/', $passwordText)){
                array_push($this->errorArray, Sonstants::$passwordNotAlphanumeric);
                return;
            }

            if(strlen($passwordText)> 30 || strlen($passwordText) < 2){
                array_push($this->errorArray, Constants::$passwordNotValidLength);
                return;
            }
        }


    }

?>