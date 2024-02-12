
    <main class="remove">
        <h1><span class="error">Are you sure?</span> You want to remove this product?</h1>
        <h2><span class="error">Product Info</span></h2>
        <h2><span class="success">Product ID:</span> #<?= $product['product_id']?></h2>
        <h2><span class="success">Name:</span> <?= $product['name']?></h2>
        <img src="<?= $product['image']?>" alt="image of <?= $product['name']?>">
        <section>
            <a href="<?= base_url('products/removeProcess/'. $product['product_id'])?>" class="confirm-button">Yes! Delete it!</a>
            <a href="<?= base_url('dashboard')?>" class="decline-button">No! Take me back!</a>
        </section>
    </main>
</body>

</html>