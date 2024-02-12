
    <main class="dashboard">
    <?= (isset($success)) ? $success : '' ?>
        <section>
<?php if(isset($products)) {?>
            <h1>Edit Product # <?= $products['product_id']?></h1>
<?php } else {?>
            <h1>Add a new Product</h1>
<?php }?>
            <a href="<?= base_url('Dashboard')?>">Return to Dashboard</a>
        </section>
        <section>
<?php if(isset($products)) {?>
            <form action="<?= base_url('Products/editProcess/'.$products['product_id'])?>" method="post">
<?php } else {?>
            <form action="<?= base_url('Products/addProcess')?>" method="post">
<?php }?>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <label>
                    Name:
                    <input type="text" name="product-name" value="<?= (isset($products) ? $products['name'] : '')?>">
                    <?= (isset($validation['product-name'])) ? $validation['product-name'] : '' ?>
                </label>
                <label>
                    Image URL:
                    <input type="text" name="product-image" value="<?= (isset($products) ? $products['image'] : '')?>">
                    <?= (isset($validation['product-image'])) ? $validation['product-image'] : '' ?>
                </label>
                <label>
                    Description:
                    <textarea name="product-description"><?= (isset($products) ? $products['product_description'] : '')?></textarea>
                    <?= (isset($validation['product-description'])) ? $validation['product-description'] : '' ?>
                </label>
                <label>
                    Price:
                    <input type="text" name="product-price" value = <?= (isset($products) ? $products['price'] : '')?>>
                    <?= (isset($validation['product-price'])) ? $validation['product-price'] : '' ?>
                </label>
                <label>
                    Inventory Count:
                    <input type="number" name="inventory-count" value=<?= (isset($products) ? $products['product_quantity'] : '')?> min=1 max=99>
                    <?= (isset($validation['inventory-count'])) ? $validation['inventory-count'] : '' ?>
                </label>
                <label>
                    Sold Quantity:
                    <input type="number" name="sold-quantity" value=<?= (isset($products) ? $products['quantity_sold'] : '')?> min=1 max=99>
                    <?= (isset($validation['sold-quantity'])) ? $validation['sold-quantity'] : '' ?>
                </label>
                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
</body>
</html>