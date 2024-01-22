<?php
$numbers = array();
$counter = 0;
for ($i = 1; $i <= 1000; $i++) {
    if ($i % 2 == 0) {
        $numbers[$counter] = $i;
        $counter++;
    }
}
var_dump($numbers);
