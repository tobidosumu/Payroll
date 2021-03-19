<?php
include 'classes/allowance.class.php';

if(isset($_POST['submit'])){

    Allowance::updateAllowance($old_allowance_name, $new_allowance_name);
    header("Location: allowances.php?new_allowance_name={$new_allowance_name}");
}

?>