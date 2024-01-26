<?php
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Bug Ticket</title>
</head>

<body>
    <img class="form-image" src="img/platelet.png" alt="image of platelet">
    <main>
        <h1 class="title">Bug Ticket</h1>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <label>
                Date Today:
                <input class="input-text" type="date" onkeydown="return false" value=<?= date('Y-m-d') ?> min=<?= date('Y-m-d') ?> max=<?= date('Y-m-d') ?> name="date">
            </label>
            <p><?= (isset($_SESSION['date-error']) ? $_SESSION['date-error'] : "") ?></p>
            <label>
                First Name
                <input class="input-text" type="text" name="first-name">
            </label>
            <?php if (isset($_SESSION['fname-error'])) {
                foreach ($_SESSION['fname-error'] as $msg) ?>
                <p><?= $msg ?></p>
            <?php } ?>
            <label>
                Last Name
                <input class="input-text" type="text" name="last-name">
            </label>
            <?php if (isset($_SESSION['lname-error'])) {
                foreach ($_SESSION['lname-error'] as $msg) ?>
                <p><?= $msg ?></p>
            <?php } ?>
            <label>
                Email Address
                <input class="input-text" type="email" name="email">
            </label>
            <?php if (isset($_SESSION['email-error'])) {
                foreach ($_SESSION['email-error'] as $msg) ?>
                <p><?= $msg ?></p>
            <?php } ?>
            <label>
                Name of the Issue
                <input class="input-text" type="text" name="issue-name">
            </label>
            <?php if (isset($_SESSION['issue-error'])) {
                foreach ($_SESSION['issue-error'] as $msg) ?>
                <p><?= $msg ?></p>
            <?php } ?>
            <label>
                Give us more details about the Issue
                <textarea name="issue-details"></textarea>
            </label>
            <?php if (isset($_SESSION['details-error'])) {
                foreach ($_SESSION['details-error'] as $msg) ?>
                <p><?= $msg ?></p>
            <?php } ?>
            <label class="input-file-label">
                Choose Screenshots (Optional)
                <input type="file" class="input-file" name="bug-img">
            </label>
            <?php if (isset($_SESSION['file-error'])) { ?>
                <p><?= $_SESSION['file-error'] ?></p>
            <?php } ?>
            <input class="submit-button" type="submit" value="Submit" name="submit">
        </form>

    </main>
</body>

</html>