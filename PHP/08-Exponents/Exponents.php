<?php
// First Problem
// $digits = array(3, 12, 30);
// function exponential($arr)
// {
//     for ($i = 0; $i < count($arr); $i++) {
//         $arr[$i] = $arr[$i] * $arr[$i] * $arr[$i];
//     }
//     return $arr;
// }
// $result = exponential($digits);
// var_dump($result); 
// /* expected output:
//         array (size=3)
//         0 => int 27
//         1 => int 1728
//         2 => int 27000
// */


// Second Problem
$digits = array(8, 11, 4);

function exponential($arr, $rep)
{
    $rep -= 1;
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 1; $j < $rep; $j++) {
            $arr[$i] *= $arr[$i];
        }
    }
    return $arr;
}

$result = exponential($digits, 4);
var_dump($result);
