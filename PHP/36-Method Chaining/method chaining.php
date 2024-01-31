<?php
class Bike{
    public $location;
    public function __construct($location = 0){
        $this->location = $location;
    }
    public function drive(){
        $this->location++;
        echo "We drove and now at Location:{$this->location} <br>";
        return $this;
        
    }
    public function reverse(){
        $this->location--;
        echo "We reversed and now at Location:{$this->location} <br>";
        return $this;
        
    }
    public function displayInfo(){
        return "We're at Location: {$this->location}";
    }
}

class Item{
    public $name;
    public $price;
    public $stock;
    public $sold;
    public function __construct($name, $price, $stock, $sold=0){
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->sold = $sold;
    }
    public function logDetails(){
        $name = $this->name ;
        $price = $this->price;
        $stock = $this->stock;
        $sold = $this->sold;
        return "Name: $name, Price: $price, Stock: $stock, Sold: $sold";
    }
    public function buy(){
        if($this-> stock <= 0){
            echo "No stock Left <br>";
            return $this;
        }
        $this->stock--;
        echo "Buying! <br>";
        return $this;
    }
    public function return(){
        if($this->sold <= 0){
            echo "Nothing Left to Return <br>";
            return $this;
        }
        $this->sold--;
        echo "Returning! <br>";
        return $this;
    }
}

$item1 = new Item('Figure', 24, 50);
$item2 = new Item('Article', 25, 60);
$item3 = new Item('PC', 26, 60, 3);

    $bike1 = new Bike();
?>
<!-- Complete about 20 to 30 minutes -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike</title>
</head>
<body>
    <p><?= $bike1->drive()->drive()->drive()->reverse()->displayInfo()?></p>
    <p>First Item :</p>
    <p><?= $item1->buy()->buy()->buy()->return()->logDetails(); ?></p>
    <p>Second Item</p>
    <p><?= $item2->buy()->buy()->return()->return()->logDetails(); ?></p>
    <p>Third Item:</p>
    <p><?= $item3->return()->return()->return()->logDetails(); ?></p>

</body>
</html>
