<?php
require "require/checkAdminLogin.php";
require "classes/staff.class.php"; 
require "classes/staff_validation.php";
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

<?php
include "include/header.php";
?>

<div class="container-fluid">
    <div class="row">
        <?php
        include "include/sidebar.php";
        ?>
        <div class="col-sm-12 col-lg-4 mt-5">
        <form action="update_staff_process.php" method="POST"><!---start--->
            <div class="form-group">
                <label>Surname</label>
                <p><?php echo $_GET['new_surname'] ?? ''; ?></p>
                <input type="text" name="old_surname" class="form-control" id="inputText" placeholder="Enter surname">
                <label class="mt-3">First Name</label>
                <p><?php echo $_GET['new_first_name'] ?? ''; ?></p>
                <input type="text" name="old_first_name" class="form-control" id="inputText" placeholder="Enter first name">
                <label class="mt-3">Phone Number</label>
                <p><?php echo $_GET['new_phone_no'] ?? ''; ?></p>
                <input type="number" name="old_phone_no" class="form-control" id="inputText" placeholder="Enter phone number">
                <label class="mt-3">Bank Name</label>
                <p><?php echo $_GET['new_bank_name'] ?? ''; ?></p>
                <input type="text" name="old_bank_name" class="form-control" id="inputText" placeholder="Enter bank name">
                <label class="mt-3">Account Number</label>
                <p><?php echo $_GET['new_account_no'] ?? ''; ?></p>
                <input type="number" name="old_account_no" class="form-control" id="inputText" placeholder="Enter account number">
            </div>
            
            <button class="btn btn-primary mb-2" name="submit" value="submit" type="submit">Add Staff</button>
        </form><!---end--->
</div>

</body>
</html>
