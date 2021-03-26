<?php
include 'classes/staff.class.php';

if(isset($_POST['submit'])){

    $sn = $_POST['sn'];
    $new_surname = $_POST['new_surname'];
    $new_first_name = $_POST['new_first_name'];
    $new_phone_no = $_POST['new_phone_no'];
    $new_bank_name = $_POST['new_bank_name'];
    $new_first_name = $_POST['new_account_no'];

    Staff::updateStaff($sn, $new_surname, $new_first_name, $new_phone_no, $new_bank_name, $new_account_no);
    header("Location: staffs.php?sn={$sn}");
}

?>