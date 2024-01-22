<?php

for ($i = 0; $i < 50; $i++) {


    $score = rand(1, 100);
    if ($score >= 95) {
        echo "<h2>Score is</h2> ";
        echo "<h1>$score</h1>";
        echo "<h2>What an excellent singer</h2> <br>";
    } else if ($score >= 80) {
        echo "<h2>Score is</h2> ";
        echo "<h1>$score</h1>";
        echo "<h2>You're getting better!</h2> <br>";
    } else if ($score >= 50) {
        echo "<h2>Score is</h2> ";
        echo "<h1>$score</h1>";
        echo "<h2>Practice more!</h2> <br>";
    } else if ($score <= 49) {
        echo "<h2>Score is</h2> ";
        echo "<h1>$score</h1>";
        echo "<h2>Never sing again, ever!</h2> <br>";
    }
}
