<?php
session_start();
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 10;
}


if (isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
    if ($_SESSION['counter'] > 0) {
        $_SESSION['counter']--;
    }
}
if (isset($_POST['submit'])) {
    $_SESSION['submit'] = $_POST['submit'];
}
if (isset($_POST['reset'])) {
    session_destroy();
}

if (isset($_POST['claim'])) {
    $_SESSION['submit'] = $_POST['submit'];
    $_SESSION['name'] = "Customer";
}

header('Location: Free Coupon.php');
