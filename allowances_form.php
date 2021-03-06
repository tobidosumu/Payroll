<?php
require "require/checkAdminLogin.php";
require "classes/allowance.class.php"; 
require "classes/allowance_validation.php";
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
        <form class="form-inline" action="allowances.php" method="POST">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Allowances</label>
                <input type="text" class="form-control-plaintext" name="staticEmail2" id="staticEmail2" value="Create New Allowance">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Allowances</label> 
                <p><?php echo $_GET['allowance'] ?? ''; ?></p>
                <input type="text" name="allowance" id="inputText" class="form-control mt-4 mb-4" placeholder="allowance" autofocus>
            </div>

            <button class="btn btn-primary mb-2" name="submit" value="submit" type="submit">Add Allowance</button>
        </form>
</div>

</body>
</html>
