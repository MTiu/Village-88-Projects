<?php

class Character
{
    protected $name;
    protected $health;
    protected $stamina;
    protected $manna;
    protected $word;

    public function __construct($name = 'Character', $health = 100, $stamina = 100, $manna = 100)
    {
        $this->name = $name;
        $this->health = $health;
        $this->stamina = $stamina;
        $this->manna = $manna;
        $this->word = 'I am Fine';
    }

    public function walk()
    {
        if ($this->stamina <= 0) {
            $this->word = "Can't you see I'm tired? <br>";
            return $this;
        } else {
            $this->stamina--;
            return $this;
        }
    }
    public function run()
    {
        if ($this->stamina <= 0) {
            $this->word = "Can't you see I'm tired? <br>";
            return $this;
        } else {
            $this->stamina -= 3;
            return $this;
        }
    }
    public function showStats()
    {
        return "$this->word <br> My name is $this->name <br> My Health is $this->health <br> My Stamina is $this->stamina <br> and my Manna is $this->manna <br><br>";
    }
}

class Shaman extends Character
{
    public function __construct($name = 'Shaman', $health = 150)
    {
        parent::__construct();
        $this->name = $name;
        $this->health = $health;
    }
    public function heal()
    {
        $this->health += 5;
        $this->stamina += 5;
        $this->manna += 5;
        $this->word .= ", I also healed";
        return $this;
    }
}

class Swordsman extends Character
{
    public function __construct($name = 'Swordsman', $health = 170)
    {
        parent::__construct();
        $this->name = $name;
        $this->health = $health;
        $this->word = 'I am Powerful!';
    }
    public function slash()
    {
        if ($this->manna <= 0) {
            $this->word = "Can't you see I'm out of Manna? <br>";
            return $this;
        } else {
            $this->manna -= 10;
            return $this;
        }
    }
    public function showStats()
    {
        return parent::showStats();
    }
}

$character = new Character();
$shaman = new Shaman();
$swordsman = new Swordsman();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character</title>
</head>

<body>
    <?= $character->walk()->walk()->walk()->run()->run()->showStats(); ?>
    <?= $shaman->walk()->walk()->walk()->run()->run()->heal()->showStats(); ?>
    <?= $swordsman->walk()->walk()->walk()->run()->run()->slash()->slash()->showStats(); ?>

    <!-- These are Errors :) -->

    <?= $character->heal()->slash(); ?>
    <?= $character->slash(); ?>
    <?= $character->heal(); ?>
</body>

</html>