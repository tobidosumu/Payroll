<?php
session_start();

if(isset($_POST['submit_data'])){

    //check if the is valid
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    if(empty($username)){
        $errors['username'] = "Please enter a username";
    }
    // this checks for empty username

    if(empty($email)){
        $errors['email'] = "Please enter your email";
    }
    // this checks for empty email

    if(empty($password)){
        $errors['password'] = "Please input your password";
    }

    if(!(strlen($password) > 7  && strlen($password) < 30)){
        $errors['password'] = "password must be between 7 and 30 characters long";
    }

    if(count($errors) > 0){
        // we have an error
        $_SESSION['errors'] = $errors;
        $_SESSION['formdata'] = $_POST;
        header('location:admin_signup.php');
    }else{
        //save data inside database
        require 'require/DB.php';

        // $password = password_hash($password,PASSWORD_DEFAULT);

        $query_string = "INSERT INTO admin set `username`='$username',`email`='$email',`password`='$password)'";

        $query = $database->query($query_string);

        if($query){ // $query == true
            //admin signup was successfull
            //redirects admin to admin_signup_success.php
            header('location:admin_signup_success.php');
        }else{
            $_SESSION['errors'] = $errors;
            $_SESSION['formdata'] = $_POST;
            header('location:admin_signup.php?message=Unknown error, please try again..');
        }

    }

}else{
    header('location:admin_signup.php?message=Please complete the signup to continue');
}

?>