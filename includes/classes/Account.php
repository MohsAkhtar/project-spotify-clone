<?php
    // Typically class names start with a capital as their file name
    class Account{
        private $errorArray;

        // constructor is something thats called as soon as class initialises
        // or variable of this class is created
        public function __construct(){
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
                return true;
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

            // TODO: check username exists
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

            // TODO: Check username has not been used
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