<?php
require "require/checkAdminLogin.php";
require "classes/deduction.class.php"; 
require "classes/deduction_validation.php";

  // $rent = new Allowance('rent'); /* example of an object i.e an instance of the class Allowance*/
  // $rent->getSerialNum(); /* picking up property from an object. E.g. of instance method */
  // $transport = new Allowance('transport');
  // $transport->getSerialNum();
  // // Allowance::getSerialNum(); 
  // Allowance::getAllowances(); /* How to call static methods */

$error_message = false;
if(isset($_POST['submit'])){
 
//create new allowance
      $deductionValidation = new DeductionValidation($_POST);
      $errors = $deductionValidation->validateDeductionForm();
      
      if ($errors) {
        $deduction = $errors['deduction'];
        header("Location: deductions_form.php?deduction={$deduction}");
      }

      $deduction = $_POST['deduction'];

      Deduction::createDeduction($deduction);

    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Deductions</title>
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
            <h3>Deductions</h3>
            <a href="deductions_form.php" type="submit" 
               class="btn btn-success margin_top">Add Deduction</a>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">SN</th>
                  <th scope="col">Name</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

              <?php
                  $deductions = Deduction::getDeductions();
                    foreach($deductions as $deduction) {
                       echo "<tr>";
                       echo "<td>". $deduction->getSerialNum(). "</td>";
                       echo "<td>". $deduction->getDeductionName(). "</td>";
                       echo "<td>". "<a href='update_deduction_form.php?deduction_name={$deduction->getDeductionName()}&&sn={$deduction->getSerialNum()}' 
                                      class='btn btn-info margin_top mt-0'> Update Deduction </a>" 
                            ."</td>";
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
