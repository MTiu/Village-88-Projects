<?php

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
        $this->sold++;
        return "Buying!";
    }
    public function return(){
        $this->sold--;
        return "Returning!";
    }
}
$item1 = new Item('Figure', 24, 50);
$item2 = new Item('Article', 25, 60);
$item3 = new Item('PC', 26, 60, 3);
?>
<!-- Time Completed 10 to 20 minutes -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item</title>
</head>
<body>
    <p>First Item :</p>
<?php for($i=0;$i <3;$i++){?>
    <p><?= $item1->buy(); ?></p>
<?php }?>
    <p><?= $item1->return();?></p>
    <p><?= $item1->logDetails();?></p>
    <p>Second Item</p>
<?php for($i=0;$i <2;$i++){?>
    <p><?= $item2->buy(); ?></p>
<?php }?>
<?php for($i=0;$i <2;$i++){?>
    <p><?= $item2->return(); ?></p>
<?php }?>
    <p><?= $item2->logDetails();?></p>
    <p>Third Item:</p>
<?php for($i=0;$i <3;$i++){?>
    <p><?= $item3->return(); ?></p>
<?php }?>
    <p><?= $item3->logDetails();?></p>
</body>
</html>