<?php
// Problem 1
// function convert_to_blanks($arr)
// {
//     foreach ($arr as $data) {
//         for ($i = 0; $i < $data; $i++) {
//             echo "_ ";
//         }
//         echo "<br>";
//     }
// }

// $list = array(6, 1, 3, 5, 7);
// convert_to_blanks($list);

// Problem 2

function convert_to_blanks($arr)
{
    foreach ($arr as $data) {
        if (is_numeric($data)) {
            for ($i = 0; $i < $data; $i++) {
                echo "_ ";
            }
            echo "<br>";
        } else {
            echo $data[0] . " ";
            for ($i = 0; $i < strlen($data) - 1; $i++) {
                echo "_ ";
            }
            echo "<br>";
        }
    }
}

$list = array(4, "Michael", 3, "Karen", 2, "Rogie");
convert_to_blanks($list);
