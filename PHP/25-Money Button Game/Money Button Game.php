<?php
session_start();
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 500;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Money Button Game</title>
</head>

<body>
    <header>
        <h1> Your money <?= " " . $_SESSION['score'] ?></h1>
        <form action="process.php" method="POST">
            <input class="button" type="submit" name="reset" value="Reset Game">
        </form>
    </header>
    <main>
        <form action="process.php" method="POST">
            <h2>Low Risk</h2>
            <img src="img/sun.jpg" alt="image of the sun tarot card">
            <?php if ($_SESSION['score'] < 0) { ?>
                <h2 class="lost">You Lost</h2>
            <?php } else { ?>
                <input class="button" type="submit">
            <?php } ?>
            <input type="hidden" name="low">
            <p>by -25 up to 100</p>
        </form>
        <form action="process.php" method="POST">
            <h2>Moderate Risk</h2>
            <img src="img/wheel.jpg" alt="image of the sun tarot card">
            <?php if ($_SESSION['score'] < 0) { ?>
                <h2 class="lost">You Lost</h2>
            <?php } else { ?>
                <input class="button" type="submit">
            <?php } ?>
            <input type="hidden" name="moderate">
            <p>by -100 up to 1000</p>
        </form>
        <form action="process.php" method="POST">
            <h2>High Risk</h2>
            <img src="img/hanged.jpg" alt="image of the sun tarot card">
            <?php if ($_SESSION['score'] < 0) { ?>
                <h2 class="lost">You Lost</h2>
            <?php } else { ?>
                <input class="button" type="submit">
            <?php } ?>
            <input type="hidden" name="high">
            <p>by -500 up to 2500</p>
        </form>
        <form action="process.php" method="POST">
            <h2>Severe Risk</h2>
            <img src="img/death.jpg" alt="image of the sun tarot card">
            <?php if ($_SESSION['score'] < 0) { ?>
                <h2 class="lost">You Lost</h2>
            <?php } else { ?>
                <input class="button" type="submit">
            <?php } ?>
            <input type="hidden" name="severe">
            <p>by -3000 up to 5000</p>
        </form>
    </main>
    <footer>
        <h3>Game Host:</h3>
        <img src=<?= (isset($_SESSION['img'])) ? $_SESSION['img'] : "img/money-plus" ?>. alt="image of money host">
        <div class="text-box">
            <?php if (isset($_SESSION['points'])) {
                foreach ($_SESSION['points'] as $point) { ?>
                    <p class=<?= ($point['point'] >= 0) ? "text-plus" : "text-minus" ?>><?= $point['date'] . " || You Pushed " . $point['risk'] . ". Value is " . $point['point'] . " Your current money now is " . $point['current']    ?></p>
            <?php }
            } ?>
        </div>
    </footer>
</body>

</html>