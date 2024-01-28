<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css" />
    <script src="jquery.bubble.js"></script>
    <script src="bubbleBody.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Authentication</title>
</head>

<body>
    <header class="form-header">
        <h1>THE Blogger</h1>
    </header>
    <main id="form-body">
        <section class="register">
            <h2>Register</h2>
            <p class="success-text"><?= (isset($_SESSION['reg-suc'])) ? $_SESSION['reg-suc'] : "" ?></p>
            <?php unset($_SESSION['reg-suc']); ?>
            <form action="process.php" method="POST">
                <div class="form-name">
                    <label>
                        First Name:
                        <?php if (!empty($_SESSION['first name-error'])) {
                            foreach ($_SESSION['first name-error'] as $msg) ?>
                            <input class="error-emphasis" type="text" name="fname">
                            <span class="error-text"><?= $msg ?></span>
                        <?php } else { ?>
                            <input type="text" name="fname">
                        <?php  }
                        unset($_SESSION['first name-error']) ?>
                    </label>
                    <label>
                        Last Name:
                        <?php if (!empty($_SESSION['last name-error'])) {
                            foreach ($_SESSION['last name-error'] as $msg) ?>
                            <input class="error-emphasis" type="text" name="lname">
                            <span class="error-text"><?= $msg ?></span>
                        <?php } else { ?>
                            <input type="text" name="lname">
                        <?php  }
                        unset($_SESSION['last name-error']) ?>
                    </label>
                </div>
                <div class="form-password">
                    <label>
                        Password:
                        <?php if (!empty($_SESSION['password-error'])) {
                            foreach ($_SESSION['password-error'] as $msg) ?>
                            <input class="error-emphasis" type="password" name="password">
                            <span class="error-text"><?= $msg ?></span>
                        <?php } else { ?>
                            <input type="password" name="password">
                        <?php  }
                        unset($_SESSION['password-error']) ?>
                    </label>
                    <label>
                        Confirm Password:
                        <?php if (!empty($_SESSION['confirm password-error'])) {
                            foreach ($_SESSION['confirm password-error'] as $msg) ?>
                            <input class="error-emphasis" type="password" name="confirm_password">
                            <span class="error-text"><?= $msg ?></span>
                        <?php } else { ?>
                            <input type="password" name="confirm_password">
                        <?php  }
                        unset($_SESSION['confirm password-error']) ?>
                    </label>
                </div>
                <label>
                    Email Address:
                    <?php if (!empty($_SESSION['email address-error'])) {
                        foreach ($_SESSION['email address-error'] as $msg) ?>
                        <input class="error-emphasis" type="email" name="email">
                        <span class="error-text"><?= $msg ?></span>
                    <?php } else { ?>
                        <input type="email" name="email">
                    <?php  }
                    unset($_SESSION['email address-error']) ?>
                </label>
                <label>
                    Contact Number:
                    <?php if (!empty($_SESSION['contact number-error'])) {
                        foreach ($_SESSION['contact number-error'] as $msg) ?>
                        <input class="error-emphasis" type="text" name="contact">
                        <span class="error-text"><?= $msg ?></span>
                    <?php } else { ?>
                        <input type="text" name="contact">
                    <?php  }
                    unset($_SESSION['contact number-error']) ?>
                </label>
                <input class="button" type="submit" name="register" value="Register">
            </form>
        </section>
        <section class="login">
            <h2>Login!</h2>
            <form action="process.php" method="POST">
                <label>
                    Email Address:
                    <?php if (!empty($_SESSION['log-email address-error'])) {
                        foreach ($_SESSION['log-email address-error'] as $msg) ?>
                        <input class="error-emphasis" type="email" name="log-email">
                        <span class="error-text"><?= $msg ?></span>
                    <?php } else { ?>
                        <input type="email" name="log-email">
                    <?php  }
                    unset($_SESSION['log-email address-error']) ?>
                </label>
                <label>
                    Password:
                    <?php if (!empty($_SESSION['log-password-error'])) {
                        foreach ($_SESSION['log-password-error'] as $msg) ?>
                        <input class="error-emphasis" type="password" name="log-password">
                        <span class="error-text"><?= $msg ?></span>
                    <?php } else { ?>
                        <input type="password" name="log-password">
                    <?php  }
                    unset($_SESSION['log-password-error']) ?>
                </label>
                <input class="button" type="submit" name="login" value="Login">
            </form>
            <a href="forgot.php">Forgot Password?</a>
        </section>
    </main>
</body>

</html>