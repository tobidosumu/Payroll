<?php
include 'classes/rank.class.php';


if(isset($_POST['submit'])){

    $new_rank_name = $_POST['new_rank_name'];
    $sn = $_POST['sn'];

    Rank::updateRank($sn, $new_rank_name);
    header("Location: ranks.php?new_rank_name={$new_rank_name}");
}

?>