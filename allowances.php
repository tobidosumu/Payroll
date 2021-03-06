<?php
require "require/checkAdminLogin.php";
require "classes/allowance.class.php"; 
require "classes/allowance_validation.php";
?>

<?php
$error_message = false;
if(isset($_POST['submit'])){
//create new allowance
      $allowanceValidation = new AllowanceValidation($_POST);
      $error = $allowanceValidation->validateAllowanceForm();
      
      if ($error) {
        $allowance = $error['allowance'];
        header("Location: allowances_form.php?allowance={$allowance}");
      }

      $allowance = $_POST['allowance'];

      $allowance1 = new Allowance($allowance);

      $allowances = Allowance::getAllowances();
      $sql = "INSERT INTO allowances (allowance) VALUES ('".$_POST["allowance"]."')";

      $database->query($sql);

      $allowance_id = $database->connection->insert_id;
    
}
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
        <div class="col-sm-12 col-lg-9 mt-3">
            <h3>Allowances</h3>
            <a href="allowances_form.php" type="submit" class="btn btn-success margin_top">Add Allowance</a>
            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($allowances as $allowance) { ?>
    <tr>
      <td scope="row">1</td>
      <td><?php echo $allowance->getAllowance(); ?></td>
    </tr>
  <?php } ?>

  </tbody>
</table>
        </div>
    </div>
</div>


</body>
</html>
