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
    <title>Staff Info</title>
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
        <?php include "include/sidebar.php";?>
        <div class="col-sm-12 col-lg-4 mt-6 pt-4">
        <h4 class="mb-3">Staff Info</h4>

        <form action="staffs.php" method="POST"><!---start--->
            <div class="form-group">
                <label>Surname</label>
                <p><?php echo $_GET['surname'] ?? ''; ?></p>
                <input type="text" name="surname" class="form-control" id="inputText" placeholder="Enter surname">
                <label class="mt-3">First Name</label>
                <p><?php echo $_GET['first_name'] ?? ''; ?></p>
                <input type="text" name="first_name" class="form-control" id="inputText" placeholder="Enter first name">
                <label class="mt-3">Phone Number</label>
                <p><?php echo $_GET['phone_no'] ?? ''; ?></p>
                <input type="number" name="phone_no" class="form-control" id="inputText" placeholder="Enter phone number">
                <label class="mt-3">Bank Name</label>
                <p><?php echo $_GET['bank_name'] ?? ''; ?></p>
                <input type="text" name="bank_name" class="form-control" id="inputText" placeholder="Enter bank name">
                <label class="mt-3">Account Number</label>
                <p><?php echo $_GET['account_no'] ?? ''; ?></p>
                <input type="number" name="account_no" class="form-control" id="inputText" placeholder="Enter account number">
                <div class="dropdown mt-3 mb-4">
                    <button class="btn btn-secondary dropdown-toggle mt-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Rank
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Management Staff</a>
                        <a class="dropdown-item" href="#">Permanent Staff</a>
                        <a class="dropdown-item" href="#">Casual Staff</a>
                    </div>
                </div>
            </div>
            
            <button class="btn btn-primary mb-2" name="submit" value="submit" type="submit">Add Staff</button>
        </form><!---end--->

</div>

</body>
</html>
