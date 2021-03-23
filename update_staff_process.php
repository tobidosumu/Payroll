<?php
include 'classes/staff.class.php';


if(isset($_POST['submit'])){

    $new_staff_name = $_POST['new_staff_name'];
    $sn = $_POST['sn'];

    Staff::updateStaff($sn, $new_staff_name);
    header("Location: staffs.php?new_staff_name={$new_staff_name}");
}

?>