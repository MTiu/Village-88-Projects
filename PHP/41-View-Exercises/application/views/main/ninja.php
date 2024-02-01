<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= <?= base_url('assets/css/main.css')?>>
    <title>Ninjas</title>
</head>
<body>
<?php for($i=1; $i<=$num;$i++){?>
    <img src="<?= base_url('assets/img/ninja/ninja'.rand(1,5)) ?>" alt="picture of ninja">
<?php }?>

</body>
</html>