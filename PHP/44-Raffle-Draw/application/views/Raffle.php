<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <title>Raffle Entry</title>
</head>
<body>
    <main>
    <p>There are <span><?php echo (isset($num))? $num : "0" ?></span> Lucky Winners selected</p>
    <h1><?php echo (isset($random))? $random : "" ?></h1>
    <form action="<?php echo base_url()?>" method="post">
        <input type="submit" value="Pick More" name="submit">
        <input type="submit" value="Reset" name="reset">
    </form>
    </main>
</body>
</html>