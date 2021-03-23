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
    <title>Allowance</title>
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
        <div class="col-sm-12 col-lg-9 mt-5">
        <form class="form-inline" action="staffs.php" method="POST">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Staffs</label>
                <input type="text" class="form-control-plaintext" name="staticEmail2" id="staticEmail2" value="Create New Staff">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Staffs</label> 
                <p><?php echo $_GET['staff'] ?? ''; ?></p>
                <input type="text" name="staff" id="inputText" class="form-control mt-4 mb-4" placeholder="staff" autofocus>
            </div>

            <button class="btn btn-primary mb-2" name="submit" value="submit" type="submit">Add Staff</button>
        </form>
</div>

</body>
</html>
