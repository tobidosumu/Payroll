<?php
require "require/checkAdminLogin.php";
require "classes/allowance.class.php"; 
require "classes/allowance_validation.php";

  // $rent = new Allowance('rent'); /* example of an object i.e an instance of the class Allowance*/
  // $rent->getSerialNum(); /* picking up property from an object. E.g. of instance method */
  // $transport = new Allowance('transport');
  // $transport->getSerialNum();
  // // Allowance::getSerialNum(); 
  // Allowance::getAllowances(); /* How to call static methods */

$error_message = false;
if(isset($_POST['submit'])){
 
//create new allowance
      $allowanceValidation = new AllowanceValidation($_POST);
      $errors = $allowanceValidation->validateAllowanceForm();
      
      if ($errors) {
        $allowance = $errors['allowance'];
        header("Location: allowances_form.php?allowance={$allowance}");
      }

      $allowance = $_POST['allowance'];

      Allowance::createAllowance($allowance);

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

              <?php
                  Allowance::updateAllowance('Rent', 'Health');

                  $allowances = Allowance::getAllowances();
                    foreach($allowances as $allowance) {
                      // var_dump($allowance);
                       echo "<tr>";
                       echo "<td>". $allowance->getSerialNum(). "</td>";
                       echo "<td>". $allowance->getAllowanceName(). "</td>";
                       echo "</tr>";
                    }
              ?>
                    
              </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>
