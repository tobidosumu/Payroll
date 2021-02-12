<?php
require "require/checklogin.php";
?>
<?php
if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $timestamp = time();
    $new_msg_string = "INSERT INTO message SET conversation_id=$id,sender_id=$user_id,message='$_POST[message]',timestamp=$timestamp";
    $database->query($new_msg_string);
    header("location:view_conversation.php?id=".$id);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Message List</title>
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
            <h3>Messages</h3>
            <?php
            $id = $_GET['id'];
            $messages = $database->query("select * from message where conversation_id=$id order by SN ASC");
            while($msg = $messages->fetch_assoc()) {
                $user = getUser($msg['sender_id'],$database);
                ?>
                <br/>
                <a href="#" class="list-group-item list-group-item-action">
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
            <form action="" method="post" class="mt-5">
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" required placeholder="Message" style="height: 120px;" name="message"></textarea>
                </div>

                <button class="btn btn-primary btn-lg" name="submit" value="message" type="submit">Reply</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>