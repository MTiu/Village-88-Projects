<?php


$list = array(2, 4, 6, 8);
foreach ($list as $key => $value) {
    echo $key . " - " . $value . "<br />";
}
// My guess is 
// 0 - 2
// 1 - 4
// 2 - 6
// 3 - 8

$list = array(2, 4, 6, 8);
foreach ($list as $value) {
    echo $value . "<br />";
}
/*
    My guess is 
    2
    4
    6
    8

*/

$fruits = array("A" => "Apple", "B" => "Banana");
foreach ($fruits as $key => $value) {
    echo $key . " - " . $value . "<br />";
}

/*
    My guess is 
    A - Apple
    B - Banana
*/

$fruits = array("A" => "Apple", "B" => "Banana");
foreach ($fruits as $key => $value) {
    echo $value . "<br />";
}

/*  
    My guess is 
    Apple
    Banana

*/

$fruits = array("A" => "Apple", "B" => "Banana");
foreach ($fruits as $key => $value) {
    echo $key . "<br />";
}

/*  
    My guess is 
    A
    B
*/

$plots = array(
    array("a1", "a2", "a3"),
    array("b1", "b2", "b3"),
    array("c1", "c2", "c3")
);
foreach ($plots as $key => $value) {
    echo "Key is {$key}<br />";
    echo "logging the value";
    var_dump($value);
}

/*  
    My guess is 
    Key is 0
    logging the value 
    array length 3
    a1 string length 2
    a2 string length 2
    a3 string length 2
    and so on
    in short it show the  var_dump the value inside the array of the array(plots)
*/

$plots = array(
    array("a1", "a2", "a3"),
    array("b1", "b2", "b3"),
    array("c1", "c2", "c3")
);
foreach ($plots as $value) {
    echo "logging the value";
    var_dump($value);
}

/*  
    My guess is 
    echo "logging the value"
    just like the first one but now it only shows the value excluding the key
    
*/

$nations = array(
    array("PH" => "Philippines", "KR" => "South Korea"),
    array("PHP" => "Philippine peso", "KRW" => "South Korean won"),
    array("Manila" => "Maynilad", "Seoul" => "Seorabeol")
);
foreach ($nations as $key => $value) {
    echo "key is {$key}<br />";
    foreach ($value as $key2 => $value2) {
        echo $key2 . " - " . $value2 . "<br />";
    }
}

/*  
    My guess is 
    Key is 0
    PH - Philippines
    KR - South Korea
    Key is 1
    PHP - Philippine peso
    KRW South Korean won
    and so on
*/

$nations = array(
    array("PH" => "Philippines", "KR" => "South Korea"),
    array("PHP" => "Philippine peso", "KRW" => "South Korean won"),
    array("Manila" => "Maynilad", "Seoul" => "Seorabeol")
);
foreach ($nations as $nation) {
    foreach ($nation as $key => $value) {
        echo $key . " - " . $value . "<br />";
    }
}

/*  
    My guess is 
    just like the first one without the key of the array;
    
*/