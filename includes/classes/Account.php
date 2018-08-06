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
        }

        // private means these can only be called from within this class
        private function validateUsername($usernameText){
            // Checks length of username is valid
            if(strlen($usernameText)> 25 || strlen($usernameText) < 5){
                // if not valid put this message in error array
                array_push($this->errorArray, "Your username has to be between 5 and 25 characters");
                // to stop execution of function'return'. ends function
                return;
            }

            // TODO: check username exists
        }
    
        private function validateFirstName($firstNameText){
            if(strlen($firstNameText)> 25 || strlen($firstNameText) < 2){
                array_push($this->errorArray, "Your first name has to be between 2 and 25 characters");
                return;
            }
        }
    
        private function validateLastName($lastNameText){
            if(strlen($lastNameText)> 25 || strlen($lastNameText) < 2){
                array_push($this->errorArray, "Your last name has to be between 2 and 25 characters");
                return;
            }
        }
    
        private function validateEmail($emailText, $emailConfirmText){
            if($emailText != $emailConfirmText){
                array_push($this->errorArray, "Your emails do not match");
                return;
            }

            // if not '!'
            // checks if email is in correct format
            // Need this check as HTML allows you to enter anything afer
            // '@' and thinks its valid
            if(!filter_var($emailText, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, "Your email is not valid");
                return;
            }

            // Don't need to repeat this code for emailConfirm as the first check won't
            // be valid if the two emails are not the same anyway

            // TODO: Check username has not been used
        }
    
        private function validatePassword($passwordText, $passwordConfirmText){
            if($passwordText != $passwordConfirmText){
                array_push($this->errorArray, "Your passwords do not match");
                return;
            }

            // Check if alphanumeric and numbers are used for pwd
            // So we are going through A-Z a-z 0-9 pattern
            // '^' means not
            // So checking if character is not in the pattern
            if(preg_match('/[^A-Za-z0-9]/', $passwordText)){
                array_push($this->errorArray, "Your password can only contain letters and numbers");
                return;
            }

            if(strlen($passwordText)> 30 || strlen($passwordText) < 2){
                array_push($this->errorArray, "Your password has to be between 5 and 30 characters");
                return;
            }
        }


    }

?>