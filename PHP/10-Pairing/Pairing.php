<?php
$cards = array('King' => 13, 'Queen' => 12, 'Jack' => 11, 'Ace' => 1);
function pairing($arr)
{
    echo "<h1>List of keys in the Array</h1>";
    echo "<ol>";
    foreach ($arr as $card => $val) {
        echo "<li> $card </li>";
    }
    echo "</ol>";
    echo "<br>";
    foreach ($arr as $card => $val) {
        echo "The value of $card in Pyramid Solitaire is $val <br>";
    }
}

pairing($cards);
