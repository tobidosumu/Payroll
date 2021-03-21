<?php
include 'classes/deduction.class.php';


if(isset($_POST['submit'])){

    $new_deduction_name = $_POST['new_deduction_name'];
    $sn = $_POST['sn'];

    Deduction::updateDeduction($sn, $new_deduction_name);
    header("Location: deductions.php?new_deduction_name={$new_deduction_name}");
}

?>