<?php
require "require/checklogin.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Conversation</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            <h3>Conversation(s)</h3>
            <?php
             $conversations = $database->query("Select * from conversation where (user_id = $user_id OR recipient_id=$user_id)");
             if($conversations->num_rows > 0) {
                 ?>
                 <div class="list-group">
                     <?php
                       while($messages = $conversations->fetch_assoc()) {
                           if($user_id != $messages['user_id']){
                                $user = getUser($messages['user_id'],$database);
                           }else{
                               $user = getUser($messages['recipient_id'],$database);
                           }

                           $recent_message = $database->
                           query("select * from message where conversation_id=$messages[SN] order by SN DESC LIMIT 1");
                            $msg = $recent_message->fetch_assoc();
                           ?>
                           <a href="view_conversation.php?id=<?php echo $messages['SN'] ?>" class="list-group-item list-group-item-action">
                               <div class="d-flex w-100 justify-content-between">
                                   <h5 class="mb-1"><?php echo $user['fullname']  ?></h5>
                                   <small class="text-muted">
                                       <?php
                                       echo date("F j, Y, g:i a",$msg['timestamp']);
                                       ?>
                                   </small>
                               </div>
                               <p class="mb-1"><?php echo $msg['message'] ?></p>
                           </a>
                           <?php
                       }
                     ?>
                 </div>
                 <?php
             }else {
                 ?>
                 You have no conversation, please <a href="new_conversation.php">click here to create one</a>
                 <?php
             }
            ?>
        </div>
    </div>
</div>


</body>
</html>
