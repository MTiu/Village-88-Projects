<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <title>Your Cart</title>
</head>

<body>
    <header>
        <h1>百合姫 Store</h1>
        <a href="<?= base_url('/') ?>">Catalog</a>
    </header>
<?php if($error){ ?>
    <div class="p-cont">
        <p class="error"><?= $error?></p>
    </div>
<?php } ?>
    <main class="cart">
        <section>
            <h2>Check Out</h2>
            <h3>Total Price: &#8369 <?= ($total) ? $total : "0"?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
<?php if($cart){?>
<?php foreach($cart as $value){?>
                    <tr>
                        <td><?= $value['name']?></td>
                        <td><?= $value['cart_item_quantity']?></td>
                        <td><?= $value['price']?></td>
                        <td><a href="<?= base_url("cart/destroy/{$value['cart_id']}") ?>" ><img src="<?= base_url('assets/img/delete.png')?>" class="delete"></a></td>
                    </tr>
<?php }} else {?>
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Billing Info</h2>
            <form action="<?= base_url('cart/billing')?>" method="post">
                <label>
                    Name: <input type="text">
                </label>
                <label>
                    Address: <input type="text">
                </label>
                <label>
                    Card Number: <input type="password">
                </label>
                <input type="submit" name="bought">
            </form>
        </section>
    </main>
    <img src="<?= base_url('assets/img/book.jpg')?>" class="book" alt="image of book anime original art" >
</body>

</html>