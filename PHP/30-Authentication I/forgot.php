<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css" />
    <script src="jquery.bubble.js"></script>
    <script src="bubbleBody.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Reset Password</title>
</head>

<body>
    <main id="form-body">
        <section class="reset">
            <h2>Reset Password</h2>
            <p class="success-text"><?= (isset($_SESSION['reg-suc'])) ? $_SESSION['reg-suc'] : "" ?></p>
            <?php unset($_SESSION['reg-suc']); ?>
            <form action="process.php" method="POST">
                <label>
                    Contact Number
                    <?php if (!empty($_SESSION['contact number-error'])) {
                        foreach ($_SESSION['contact number-error'] as $msg) ?>
                        <input class="contact-forget error-emphasis" type="text" name="contact-forget">
                        <span class="error-text"><?= $msg ?></span>
                    <?php } else { ?>
                        <input class="contact-forget" type="text" name="contact-forget">
                    <?php  }
                    unset($_SESSION['contact number-error']) ?>
                    <input class="button" type="submit" value="Submit" name="contact-submit">
                </label>
            </form>
            <a href="process.php">Return</a>
        </section>
    </main>
</body>

</html>