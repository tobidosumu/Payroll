<?php
include 'classes/allowance.class.php';


if(isset($_POST['submit'])){

    $new_allowance_name = $_POST['new_allowance_name'];
    $sn = $_POST['sn'];

    Allowance::updateAllowance($sn, $new_allowance_name);
    header("Location: allowances.php?new_allowance_name={$new_allowance_name}");
}

?>