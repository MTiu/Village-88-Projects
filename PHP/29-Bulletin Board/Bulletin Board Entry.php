<?php
session_start();
session_destroy()
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
    <title>Bulletin Board Entry</title>
</head>

<body>
    <main>
        <h1 class="title">Bulletin Board Entry</h1>
        <form action="process.php" method="POST">
            <label>
                Subject:
                <input class="input-text" type="text" name="subject" placeholder="Insert Topic">
            </label>
            <?php if (!empty($_SESSION['subject-error'])) {
                foreach ($_SESSION['subject-error'] as $msg) { ?>
                    <p class="error"><?= $msg ?></p>
            <?php }
                unset($_SESSION['subject-error']);
            }  ?>
            <label class="details-label" for="details">Details:</label>
            <textarea type="text" id="details" name="details"></textarea>
            <?php if (!empty($_SESSION['details-error'])) {
                foreach ($_SESSION['details-error'] as $msg) ?>
                <p class="error"><?= $msg ?></p>
            <?php } ?>
            <input class="submit-button" type="submit" value="Add" name="submit">
            <input class="submit-button" type="submit" value="Skip" name="skip">
        </form>

    </main>
</body>

</html>