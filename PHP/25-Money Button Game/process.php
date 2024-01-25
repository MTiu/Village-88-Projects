<?php
session_start();

function assign_score($min, $max)
{
    $point = rand($min, $max);
    if ($point < 0) {
        $_SESSION['img'] = 'img/money-minus.gif';
    } else {
        $_SESSION['img'] = 'img/money-plus.gif';
    }
    $_SESSION['score'] += $point;
    array_push($_SESSION['points'], array('point' => $point, 'date' => date("m-d-Y h:i:sa"), 'risk' => 'Low Risk', 'current' => $_SESSION['score']));
}

if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = array();
}

if (isset($_POST['low'])) {
    assign_score(-25, 100);
}

if (isset($_POST['moderate'])) {
    assign_score(-100, 1000);
}

if (isset($_POST['high'])) {
    assign_score(-500, 2500);
}

if (isset($_POST['severe'])) {
    assign_score(-3000, 5000);
}

if (isset($_POST['reset'])) {
    session_destroy();
}


header('Location: Money Button Game.php');
