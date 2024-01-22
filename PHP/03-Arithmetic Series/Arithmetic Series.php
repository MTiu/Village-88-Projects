<?php
$numbers = array(2, 5, 8, 11, 14);

$sum = count($numbers) / 2 * (2 * $numbers[0] + (count($numbers) - 1) * ($numbers[1] - $numbers[0]));

echo "The Arithmetic sum is $sum";
