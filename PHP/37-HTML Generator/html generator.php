<?php
    class HTMLGenerator{
        public function reader_input($arr){
            foreach($arr as $key => $item){
                echo "<label> $key " ;
                echo "<input type='text' value='$item'";
                echo "</label>";
            }
        }
        public function reader_list($arr,$type){
        strtolower($type);
        if($type == 'unordered'){
            echo "<ul>";
            foreach($arr as $item){
                echo "<li>$item</li>";
            }    
            echo "</ul>";
        }
        if($type == 'ordered'){
            echo "<ol>";
            foreach($arr as $item){
                echo "<li>$item</li>";
            }    
            echo "</ol>";
        }
        }
    }
    // Done within 10 to 30 minutes
    $generator = new HTMLGenerator();
    $arr1 = array('Name' => 'Bag', 'Price' => 250, 'Stocks' => 10);
    $arr2 = array('Apple','Banana','Cherry');
    $generator->reader_input($arr1);
    $generator->reader_list($arr2,'ordered');
    $generator->reader_list($arr2,'unordered');

?>

