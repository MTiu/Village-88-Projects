<?php
$wins = 0;
$fail = 0;

for ($i = 1; $i <= 1000; $i++) {
    $score = rand(1, 100);
    echo "Attempt #$i: Shooting the ball... ";

    if ($score > 50) {
        echo "Success! ...";
        $wins++;
    } else {
        echo "Epic Fail! ...";
        $fail++;
    }
    echo "Got {$wins}x success and {$fail}x epic fail(s) so far <br><br>";
}
