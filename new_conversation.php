<?php
require "require/checklogin.php";
?>
<?php
$error_message = false;
if(isset($_POST['submit'])){
//create new conversation
    if($_POST['user_email'] == $user_info['email'] || $_POST['user_email'] == $user_info['username']){
        $error_message = "You can not send message to yourself!..";
    }else{
        $user_email = $_POST['user_email'];
        $recipent = $database->query("select * from users where (username = '$user_email' OR email = '$user_email')");
        if($recipent->num_rows ==0){
            $error_message = "Recipient with ".$user_email." does not exist!..";
        }else{

            $recipent_info = $recipent->fetch_assoc();

            $recipent_id = $recipent_info['SN'];

            $timestamp = time();
            //create conversation

            $conversation_string = "INSERT INTO conversation SET user_id=$user_id,recipient_id=$recipent_id,timestamp='$timestamp'";

            $database->query($conversation_string);

            $conversation_id = $database->connection->insert_id;

            $message = $_POST['message'];

            $message_strung = "INSERT INTO message SET conversation_id=$conversation_id,sender_id=$user_id,message='$message',timestamp= $timestamp";

            $database->query($message_strung);

            header('location:new_conversation.php?message=Conversation has been created successfully!.');

        }

    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>New Conversation</title>
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
            <h3>New Conversation</h3>
                <form action="" method="post">
                    <span class="d-block" style="color:red;font-size: 10px;"><?php echo $error_message; ?></span>
                    <?php
                    if(isset($_GET['message'])) {
                        ?>
                        <span class="d-block" style="color:green;font-size: 15px;"><?php echo $_GET['message']; ?></span>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label>Username or Email Address</label>
                        <input type="text" required name="user_email" placeholder="Enter Email address or Username" class="form-control form-control-sm"/>
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" required placeholder="Message" style="height: 120px;" name="message"></textarea>
                    </div>

                    <button class="btn btn-primary btn-lg" name="submit" value="message" type="submit">Send Message</button>

                </form>
        </div>
    </div>
</div>


</body>
</html>
