<?php
session_start();

if (isset($_POST['submit_data'])) {

    //check if the is valid
    $allowance = $_POST['allowance'];

    $errors = [];

        // this checks for empty username
    if(empty($allowance)) {
        $errors['allowance'] = "Please enter allowance name";
    }

    if (!(strlen($allowance) > 2  && strlen($password) < 25)) {
        $errors['password'] = "password must be between 2 and 25 characters long";
    }

    if (count($errors) > 0) {
        // we have an error
        $_SESSION['errors'] = $errors;
        $_SESSION['formdata'] = $_POST;
        header('location:allowances_form.php');
    } else {
        //save data inside database
        require 'require/DB.php';

        // $password = password_hash($password,PASSWORD_DEFAULT);

        $query_string = "INSERT INTO allowances set `allowance`='$allowance'";

        $query = $database->query($query_string);

        if ($query) { // $query == true
            //admin signup was successfull
            //redirects admin to admin_signup_success.php
            header('location:admin_signup_success.php');
        } else {
            $_SESSION['errors'] = $errors;
            $_SESSION['formdata'] = $_POST;
            header('location:allowances.php?message=Unknown error, please try again..');
        }
    }
} else {
    header('location:allowances_form.php?message=Please fill the form to continue');
}
?>