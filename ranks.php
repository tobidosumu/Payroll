<?php
require "require/checkAdminLogin.php";
require "classes/rank.class.php"; 
require "classes/rank_validation.php";

$error_message = false;
if(isset($_POST['submit'])){
 
//create new rank
      $rankValidation = new RankValidation($_POST);
      $errors = $rankValidation->validateRankForm();
      
      if ($errors) {
        $rank = $errors['rank'];
        header("Location: ranks_form.php?rank={$rank}");
      }

      $rank = $_POST['rank'];

      Rank::createRank($rank);

    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rank</title>
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
            <h3>Ranks</h3>
            <a href="ranks_form.php" type="submit" 
               class="btn btn-success margin_top">Add Rank</a>
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
                  $ranks = Rank::getRanks();
                    foreach($ranks as $rank) {
                       echo "<tr>";
                       echo "<td>". $rank->getSerialNum(). "</td>";
                       echo "<td>". $rank->getRankName(). "</td>";
                       echo "<td>". "<a href='update_rank_form.php?rank_name={$rank->getRankName()}&&sn={$rank->getSerialNum()}' 
                                      class='btn btn-info margin_top mt-0'> Update Rank </a>" 
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
