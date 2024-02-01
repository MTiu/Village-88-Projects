<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Say</title>
</head>
<body>
<?php if(!empty($data)) {?>
    <h1>You said! <?= $data['word'] ?> <?= $data['num'] ?> Times! and it was great!</h1>
<?php for($i=0; $i<$data['num'];$i++){ ?>
    <h1><?= $data['word'] ?></h1>
<?php } } else{ ?>
    <h1>SORRY THE URL DOESN'T MEET OUT REQUIREMENTS</h1>
<?php } ?>
</body>
</html>