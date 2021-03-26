<?php
require "require/checkAdminLogin.php";
require "classes/staff.class.php"; 
require "classes/staff_validation.php";

$error_message = false;
if(isset($_POST['submit'])){
 
//create new staff
      unset($_POST['submit']);
      $staffValidation = new StaffValidation($_POST);
      $errors = $staffValidation->validateStaffForm();
      
      if ($errors) {
        $staff = $errors['staff'];
        header("Location: staffs_form.php?staff={$staff}");
      }

      $staff = $_POST;
      Staff::createStaff($staff);

    }
    
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

<div class="container-fluid">
    <div class="row">
        <?php include "include/sidebar.php" ?>
        <div class="col-sm-12 col-lg-9 mt-3">
            <h3>Staffs</h3>
            <a href="staffs_form.php" type="submit" 
               class="btn btn-success margin_top mr-5">Add Staff</a>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">SN</th>
                  <th scope="col">Surname</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Bank Name</th>
                  <th scope="col">Account Number</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

              <?php
                  $staffs = Staff::getStaffs();
                    foreach($staffs as $staff) {
                       echo "<tr>";
                       echo "<td>". $staff->getSerialNum(). "</td>";
                       echo "<td>". $staff->getSurname(). "</td>";
                       echo "<td>". $staff->getFirst_name(). "</td>";
                       echo "<td>". $staff->getPhone_no(). "</td>";
                       echo "<td>". $staff->getBank_name(). "</td>";
                       echo "<td>". $staff->getAccount_no(). "</td>";
                       echo "<td>". "<a href='update_staff_form.php?sn={$staff->getSerialNum()}' 
                                      class='btn btn-info mt-0'> Update Staff </a>" 
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
