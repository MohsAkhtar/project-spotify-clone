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

    

    if(isset($_POST['registerButton'])){
        // if you see $ means it is variable
        $username = sanitizeFormUsername($_POST['registerUsername']);
        $firstName = sanitizeFormString($_POST['firstName']);
        $lastName = sanitizeFormString($_POST['lastName']);
        $email = sanitizeFormUsername($_POST['email']);
        $emailConfirm = sanitizeFormUsername($_POST['emailConfirm']);
        $password = sanitizeFormPassword($_POST['password']);
        $password2 = sanitizeFormPassword($_POST['password2']);

        // call register function from Account() class
        $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $emailConfirm, $password, $password2);
        
        // if registration was successful
        if($wasSuccessful){
            // 'header' redirects to 'Location'
            header("Location: index.php");
        }
    }
?>

