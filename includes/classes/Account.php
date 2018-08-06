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
    
        }
    
        private function validateLastName($lastNameText){
            
        }
    
        private function validateEmail($emailText, $emailConfirmText){
            
        }
    
        private function validatePassword($passwordText, $passwordConfirmText){
            
        }


    }

?>