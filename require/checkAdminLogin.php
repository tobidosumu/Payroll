<?php
session_start();
require "DB.php";

if(!isset($_SESSION['is_login'])){
    //means the admin has not logged in or admin's session has expired
    header('location:index.php?message=Login to continue');
}

$admin_info = [];

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
    //query database to get admin's information
    $admin = $database->query("select * from admin where SN=$admin_id");
    if($admin->num_rows === 1){
        $admin_info = $admin->fetch_assoc();
    }
}

function getStaff($admin_id,$database){

    $admin = $database->query("select * from admin where SN=$admin_id");

    return $admin->fetch_assoc();
}