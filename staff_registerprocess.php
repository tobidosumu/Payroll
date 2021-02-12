<?php
session_start();

if(isset($_POST['submit_data'])){

    //check if the is valid
    $surname = $_POST['surname'];
    $firstName = $_POST['firstName'];
    $phoneNum = $_POST['phoneNum'];
    $accountNum = $_POST['accountNum'];
    $bankName = $_POST['bankName'];

    $errors = [];

    if(empty($surname)){
        $errors['surname'] = "Please enter staff surname";
    }
    // this check for valid email address

    if(empty($firstName)){
        $errors['firstName'] = "Please enter staff first name";
    }
    // this check for if the username is blank

    if(!(strlen($phoneNum) >= 11)){
        $errors['phoneNum'] = "Phone number must be 11 digits long";
    }
    
    if(empty($phoneNum)){
        $errors['phoneNum'] = "Please enter staff phone number";
    }

    if(empty($accountNum)){
        $errors['accountNum'] = "Please enter staff account number";
    }

    // if(empty($password)){
    //     $errors['password'] = "Please input your password";
    // }

    // if(!(strlen($password) > 6  && strlen($password) < 36)){
    //     $errors['password'] = "password must be between 6 and 36 characters length";
    // }

    if(count($errors) > 0){
        // we have an error
        $_SESSION['errors'] = $errors;
        $_SESSION['formdata'] = $_POST;
        header('location:staff_register.php');
    }else{
        //save data inside database
        require 'require/DB.php';

        // $password = password_hash($password,PASSWORD_DEFAULT);

        $query_string = "INSERT INTO staff set `surname`='$surname',`firstName`='$firstName',`phoneNum`='$phoneNum',`accountNum`='$accountNum', `bankName`='$bankName'";

        $query = $database->query($query_string);

        if($query){ // $query == true
            //staff registration was successful
            //redirects the user to registration successful page
            header('location:staff_registration_success.php');
        }else{
            $_SESSION['errors'] = $errors;
            $_SESSION['formdata'] = $_POST;
            header('location:staff_register.php?message=Unknown error, please try again..');
        }

    }

}else{
    header('location:staff_register.php?message=Please complete the registration to continue');
}

?>