<?php
session_start();
if (isset($_POST['email_address'])) {
    require 'require/DB.php';

    // $database = new DB('localhost', 'root', '', 'payroll');

    $email = $_POST['email_address'];
    $password = $_POST['password'];

    $admin = $db_connect->query("select * from admin where email='$email'");

    if ($admin->num_rows === 0) {
        header('location:index.php?message=Invalid Email and Password Combination');
    } else
        if ($admin->num_rows === 1) {
            $admin_info = $admin->fetch_assoc();
            
            //compare password with the password the user typed
            if ($password == $admin_info['password']) {
                //password is okay
                $_SESSION['email'] = $admin_info['email'];
                $_SESSION['admin_id'] = $admin_info['id'];
                $_SESSION['is_login'] = true;
                header("location:homepage.php");
            } else{
                // exit($admin_info['password']);
                //password is not okay
                //send user back to login page
                header('location:index.php?message=Invalid Password');
            }
        } else {
            header('location:index.php?message=Unknown error occurred, Please try again!..');
        }
} else {
    header('location:index.php?message=Login to continue!..');
}

