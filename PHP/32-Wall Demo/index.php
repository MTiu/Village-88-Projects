<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wall Demo</title>
</head>
<body>
    <p>Hello User</p>
    <a href="process.php">Log Out</a>
    <h1>This is my wall hello!</h1>
    <h2>Post a Message</h2>

    <form action="process.php" method="post">
    <textarea name="message_text" placeholder="post a message"></textarea>
    <input type="submit" value="message">
    </form>

    <div class="messages">
        <?php if(isset($_SESSION['displayMessages'])){ ?>
            <?php } foreach($_SESSION['displayMessages'] as $message) {?>
                <h3><?= $message['first_name'] . " " . $message['last_name'] . " " . $message['created_at']?></h3>
                <p><?= $message['message'] ?></p>
                
        <div class="comments">
        <?php foreach($_SESSION['displayComments'] as $comment) {?>
            <?php if($comment['message_id'] == $message['message_id']){?>
                <h3><?= $comment['first_name'] . " " . $comment['last_name'] . " " . $comment['created_at']?></h3>
                <p><?= $comment['message'] ?></p>
                <?php } ?>
                
                <?php }?>
                <form action="process.php" method="post">
                    <input type="hidden" name='message_id' value=<?= $message['message_id']?>>
                    <textarea name="comment_text" placeholder="post a comment"></textarea>
                    <input type="submit" value="comment">
                </form>
        </div>
        <?php }?>
    </div>
    
</body>
</html>