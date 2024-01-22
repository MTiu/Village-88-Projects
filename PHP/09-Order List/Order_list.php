<?php
$x = array('Spaghetti', 'Pizza', 'Iced tea');
function print_orders($arr)
{
    echo "<ol>";
    foreach ($arr as $order) {
        echo "<li> $order </li>";
    }
    echo "</ol>";
}

print_orders($x);
