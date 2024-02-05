<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <title>Show Contact</title>
</head>
<body>
    <p><a href="<?php echo base_url('contacts')?>">Go back</a>  |   <a href="<?php echo base_url("contacts/edit/$id") ?>"> Edit</a></p>
    <h1>Contact # <?php echo $id ?></h1>
    <h2>Name : <?php echo $name ?></h2>
    <h2>Contact number: <?php echo $number ?></h2>
</body>
</html>