<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Free Coupon</title>
</head>

<body>
    <main>
        <h1>Welcome <?= (!empty($_SESSION['name']) ? $_SESSION['name'] . "!" : "Customer!") ?></h1>
        <p>We're giving away <span class="emphasize">free coupons</span></p>
        <p>as token of appreciation</p>
        <?php if (!isset($_SESSION['submit'])) { ?>
            <p>for first <?= (isset($_SESSION['counter'])) ? $_SESSION['counter'] : "10" ?> customer(s)</p>
            <form class="coupon-get" action="process.php" method="POST">
                <p>Kindly Type your name</p>
                <input type="text" name="name">
                <input class="submit-button" type="submit" value="Submit" name="submit">
            </form>
        <?php } ?>
        <?php if (isset($_SESSION['submit'])) { ?>
            <form class="coupon-got" action="process.php" method="POST">
                <?php if ($_SESSION['counter'] == 0) {
                ?>
                    <p class="discount">Sorry</p>
                    <p class="coupon">Unavailable</p>
                    <input class="reset-button-last" type="submit" value="Reset Count" name="reset">
                <?php } else { ?>
                    <p class="discount"><?= rand(1, 80) ?>% Discount</p>
                    <p class="coupon"><?= rand(1000000, 9999999) ?></p>
                    <input class="reset-button" type="submit" value="Reset Count" name="reset">
                    <input class="submit-button" type="submit" value="Claim Again" name="claim">
                <?php } ?>
            </form>
        <?php } ?>
    </main>
</body>

</html>