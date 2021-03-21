<?php
session_start();

if (isset($_POST['submit_data'])) {

    //check if the is valid
    $deduction = $_POST['deduction'];

    $errors = [];

        // this checks for empty username
    if(empty($deduction)) {
        $errors['deduction'] = "Please enter deduction name";
    }

    if (!(strlen($deduction) > 2  && strlen($deduction) < 25)) {
        $errors['deduction'] = "password must be between 2 and 25 characters long";
    }

    if (count($errors) > 0) {
        // we have an error
        $_SESSION['errors'] = $errors;
        $_SESSION['formdata'] = $_POST;
        header('location:deductions_form.php');
    } else {
        //save data inside database
        require 'require/DB.php';

        // $password = password_hash($password,PASSWORD_DEFAULT);

        $query_string = "INSERT INTO deductions set `deduction`='$deduction'";

        $query = $database->query($query_string);

        if ($query) { // $query == true
            //admin signup was successfull
            //redirects admin to admin_signup_success.php
            header('location:admin_signup_success.php');
        } else {
            $_SESSION['errors'] = $errors;
            $_SESSION['formdata'] = $_POST;
            header('location:deductions.php?message=Unknown error, please try again..');
        }
    }
} else {
    header('location:deductions_form.php?message=Please fill the form to continue');
}
?>