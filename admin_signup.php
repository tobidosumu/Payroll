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
    <title>Payroll | Admin Signup</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" autocomplete="off" method="post" action="admin_login_process.php">
    <h2>PAYROLL</h2>
    <h4 class="h4 mb-3 font-weight-normal">Admin Signup</h4>

    <?php
    if(isset($_GET['message'])) {
        ?>
        <span class="d-block" style="color:red; font-size: 10px;"><?php echo $_GET['message']; ?></span>
        <?php
    }
    ?>
    <label for="inputText" class="sr-only">Username</label>
    <input type="text" id="inputText" value="<?php if(isset( $formdata['username'])) echo $formdata['username'] ?>" name="username" autocomplete="off" class="form-control mt-4 mb-4" placeholder="Username" autofocus>
    <?php
    if(isset($errors['username'])) {
        ?>
        <span class="d-block" style="color:red; font-size: 10px;"><?php echo $errors['username'];  ?></span>
        <?php
    }
    ?>

    <label for="inputEmail" class="sr-only">Email</label>
    <input type="text" id="inputEmail" value="<?php if(isset($formdata['email'])) echo $formdata['email'] ?>"  name="email" autocomplete="off" class="form-control mt-4 mb-4" placeholder="Email Address"  autofocus>
    <?php
    if(isset($errors['email'])) {
        ?>
        <span class="d-block" style="color:red; font-size: 10px;"><?php echo $errors['email'];  ?></span>
        <?php
    }
    ?>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password"  name="password" id="inputPassword" class="form-control mb-3" placeholder="Password" >
    <?php
    if(isset($errors['password'])) {
        ?>
        <span class="d-block" style="color:red;font-size: 10px;"><?php echo $errors['password'];  ?></span>
        <?php
    }
    ?>

    <button class="btn btn-lg btn-primary btn-block" name="submit_data" value="submit button" type="submit">Register</button>
    <a href="index.php" class="mt-2 d-block">Admin Login</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
</form>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
