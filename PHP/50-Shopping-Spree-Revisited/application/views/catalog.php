<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <title>Catalog Page</title>
</head>

<body>
    <header>
        <h1>百合姫 Store</h1>
        <a href="<?= base_url('cart')?>">Cart(<?= $count?>)</a>
    </header>
<?php if($error){ ?>
    <div class="p-cont">
        <p class="error"><?= $error?></p>
    </div>
<?php } ?>
<?php if($success){ ?>
    <div class="p-cont">
        <p class="success"><?= $success?></p>
    </div>
<?php } ?>
    <main class="catalog">
<?php foreach($data as $value){?>
        <section>
            <img src="<?= base_url('assets/img/') . $value['img']?>" alt="Picture of <?= $value['name'] ?>">
            <h2><?= $value['name']?></h2>
            <p>for</p>
            <p class="price">&#8369 <?= $value['price'] ?></p>
            <p class="price">Stock: <span class="value"><?= $value['quantity'] ?></span></p>
<?= form_open(base_url('Catalogs/buy'), "method=post")?>
                <input type="hidden" name="id" value="<?= $value['item_id']?>">
                <input type="number" min=1 max=<?= $value['quantity'] ?> name="number" value="1">
                <input type="submit" value="Add to Cart">
<?= form_close() ?>
        </section>
<?php } ?>
    </main>
</body>

</html>