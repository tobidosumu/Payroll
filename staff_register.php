<?php
session_start();
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
if(isset($_SESSION['formdata'])) {
    $formdata = $_SESSION['formdata'];
}
session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Payroll | Register</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" autocomplete="off" method="post" action="staff_registerprocess.php" >
    <h2>PAYROLL</h2>
    <h4 class="h4 mb-3 font-weight-normal">Staff Registration</h4>

    <?php
    if(isset($_GET['message'])) {
        ?>
        <span class="d-block" style="color:red;font-size: 10px;"><?php echo $_GET['message']; ?></span>
        <?php
    }
    ?>
    <label for="inputText" class="sr-only">Surname</label>
    <input type="text" id="inputText" value="<?php if(isset( $formdata['surname'])) echo $formdata['surname'] ?>" name="surname" autocomplete="off" class="form-control mt-4 mb-4" placeholder="Surname" autofocus>
    <?php
    if(isset($errors['surname'])) {
        ?>
        <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['surname'];  ?></span>
        <?php
    }
    ?>

    <label for="inputText" class="sr-only">First Name</label>
    <input type="text" id="inputText" value="<?php if(isset($formdata['firstName'])) echo $formdata['firstName'] ?>"  name="firstName" autocomplete="off" class="form-control mt-4 mb-4" placeholder="First Name"  autofocus>
    <?php
    if(isset($errors['firstName'])) {
        ?>
        <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['firstName'];  ?></span>
        <?php
    }
    ?>

    <label for="inputNumber" class="sr-only">Phone Number</label>
    <input type="text" id="inputNumber" value="<?php if(isset($formdata['phoneNum'])) echo $formdata['phoneNum'] ?>"  name="phoneNum" autocomplete="off" class="form-control mt-4 mb-4" placeholder="Phone Number"  autofocus>
    <?php
    if(isset($errors['phoneNum'])) {
        ?>
        <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['phoneNum'];  ?></span>
        <?php
    }
    ?>

    <label for="inputNumber" class="sr-only">Account Number</label>
    <input type="text" id="inputNumber" value="<?php if(isset($formdata['accountNum'])) echo $formdata['accountNum'] ?>"  name="accountNum" autocomplete="off" class="form-control mt-4 mb-4" placeholder="Account Number"  autofocus>
    <?php
    if(isset($errors['accountNum'])) {
        ?>
        <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['accountNum'];  ?></span>
        <?php
    }
    ?>

    <label for="inputText" class="sr-only">Bank Name</label>
    <input type="text" id="inputText" value="<?php if(isset($formdata['bankName'])) echo $formdata['bankName'] ?>"  name="bankName" autocomplete="off" class="form-control mt-4 mb-4" placeholder="Bank Name"  autofocus>
    <?php
    if(isset($errors['bankName'])) {
        ?>
        <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['bankName'];  ?></span>
        <?php
    }
    ?>


    <button class="btn btn-lg btn-primary btn-block" name="submit_data" value="submit button" type="submit">Register</button>
    <!-- <a href="index.php" class="mt-2 d-block">Admin Login</a> -->
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
</form>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
