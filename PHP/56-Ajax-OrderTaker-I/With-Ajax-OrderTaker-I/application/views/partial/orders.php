
<?php foreach($orders as $order){?>
        <section id="order-list" class="orders">
            <h1><?= $order['id']?></h1>
            <p><?= $order['description']?></p>
        </section>
<?php } ?>
