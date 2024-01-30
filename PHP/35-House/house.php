<?php
    class House{
    public $location;
    public $price;
    public $lot;
    public $type;
    public $discount;
    public $totalPrice;
    
    public function __construct($location, $price, $lot, $type){
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        if($type == 1){
            $this->type = 'Pre-Selling';
            $this->discount = 0.2;
            $this->totalPrice = $price - ($this->discount*$price);
        }else{
            $this->type = 'Ready for Occupancy';
            $this->discount = 0.05;
            $this->totalPrice = $price - ($this->discount*$price);
        }
        echo "<br>" .$this->show_all() . "<br>";
    }
    public function show_all(){
        return "Location: {$this->location}, Price: {$this->price}, lot: {$this->lot}, Type: {$this->type}, Discount: {$this->discount}, Total Price: {$this->totalPrice}";
    }
}
$house1 = new House('La Union',1500000,'100sqm',1);
$house2 = new House('Metro Manila',1000000,'150sqm',2);
$house3 = new House('Tokyo',2000000,'90sqm',2);
$house4 = new House('Canada',5000000,'200sqm',2);
$house5 = new House('Osaka',60000000,'300sqm',1);
?>

<!-- complete about 20 minutes -->
