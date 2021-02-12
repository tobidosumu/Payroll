
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Payroll | Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<form class="form-signin" method="POST" action="admin_login_process.php">


    <h2>PAYROLL</h2>
    <h3 class="h4 mb-3 font-weight-normal">Admin Login</h3>
    <?php
    if(isset($_GET['message'])) {
        ?>
        <span style="color:red; font-size: 14px" class="d-block"><?php echo $_GET['message']; ?></span>
        <?php
    }
    ?>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="email_address" id="inputEmail" class="form-control mt-4 mb-4" placeholder="Email address"  autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <a href="admin_signup.php" class="mt-2 d-block">Admin Signup</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
</form>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
