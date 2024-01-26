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
    <title>Raffle Entry</title>
</head>

<body>
    <main>
        <h1 class="title">Raffle Entry</h1>
        <form action="process.php" method="POST">
            <label>
                Contact-Number
                <input class="input-text" type="text" name="contacts" placeholder="Insert your Number">
            </label>
            <?php if (!empty($_SESSION['contact-error'])) {
                foreach ($_SESSION['contact-error'] as $msg) ?>
                <p><?= $msg ?></p>
            <?php } ?>
            <input class="submit-button" type="submit" value="Submit" name="submit">
        </form>
    </main>
</body>

</html>