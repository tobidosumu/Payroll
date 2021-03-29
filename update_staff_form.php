<?php
require "require/checkAdminLogin.php";
require "classes/staff.class.php"; 
require "classes/staff_validation.php";

$sn = $_GET['sn'];
if(isset($_POST['submit'])){
    unset($_POST['submit']);
    Staff::updateStaff($sn, $_POST);
    header("Location: staffs.php?sn={$sn}");
}

$staff = Staff::getStaff($sn);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Staff</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<?php include "include/header.php" ?>

<div class="container-fluid">
    <div class="row">
        <?php include "include/sidebar.php" ?>
        <div class="col-sm-12 col-lg-4 mt-5">
        <form action="" method="POST"><!---start--->
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" value="<?php echo $staff->getSurname() ?>" class="form-control" id="inputText" placeholder="Enter surname">
                <label class="mt-3">First Name</label>
                <input type="text" name="first_name" value="<?php echo $staff->getFirst_name() ?>" class="form-control" id="inputText" placeholder="Enter first name">
                <label class="mt-3">Phone Number</label>
                <input type="number" name="phone_no" value="<?php echo $staff->getPhone_no() ?>" class="form-control" id="inputText" placeholder="Enter phone number">
                <label class="mt-3">Bank Name</label>
                <input type="text" name="bank_name" value="<?php echo $staff->getBank_name() ?>" class="form-control" id="inputText" placeholder="Enter bank name">
                <label class="mt-3">Account Number</label>
                <input type="number" name="account_no" value="<?php echo $staff->getAccount_no() ?>" class="form-control" id="inputText" placeholder="Enter account number">
            </div>
            <div class="dropdown mt-4 mb-4">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Management Staff</a>
                    <a class="dropdown-item" href="#">Permanent Staff</a>
                    <a class="dropdown-item" href="#">Casual Staff</a>
                </div>
            </div>
            <button class="btn btn-primary mb-2" name="submit" value="submit" type="submit">Update Staff</button>
        </form><!---end--->
</div>

</body>
</html>
