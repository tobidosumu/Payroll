<?php
require "require/checkAdminLogin.php";
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
                <!-- <input type="text" class="form-control" id="allowance" placeholder="Enter Allowance Name"> -->
                <input type="text" id="inputText" value="<?php if(isset( $formdata['allowance'])) echo $formdata['allowance'] ?>" name="allowance" autocomplete="off" class="form-control mt-4 mb-4" placeholder="allowance" autofocus>
    <?php
    if(isset($errors['allowance'])) {
        ?>
        <span class="d-block" style="color:red; font-size: 10px;"><?php echo $errors['allowance'];  ?></span>
        <?php
    }
    ?>
            </div>
            <button class="btn btn-primary mb-2" name="submit_data" value="submit button" type="submit">Add Allowance</button>
        </form>
</div>

</body>
</html>
