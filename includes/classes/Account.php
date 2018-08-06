<?php
    // Typically class names start with a capital as their file name
    class Account{
        // constructor is something thats called as soon as class initialises
        // or variable of this class is created
        public function __construct(){

        }

        // public means you can manually call it from other files
        // it can access the private functions in the class its in
        public function register(){ 
            // this means this instance of the class   
            $this->validateUsername($username);
            $this->validateFirstName($firstName);
            $this->validateLastName($lastName);
            $this->validateEmail($email, $emailConfirm);
            $this->validatePassword($password, $password2);
        }

        // private means these can only be called from within this class
        private function validateUsername($usernameText){
            echo "username function called";
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