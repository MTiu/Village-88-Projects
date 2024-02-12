
    <main class="dashboard">
        <section>
<?php if(isset($admin)){?>
            <h1>Manage Products</h1>
            <a href="Products/new">Add new</a>
<?php } else {?>
            <h1>All Products</h1>
<?php }?>
        </section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Inventory Count</th>
                    <th>Quantity Sold</th>
<?php if(isset($admin)){?>
                    <th>Action</th>
<?php }?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product){?>
                <tr>
                    <td><?= $product['product_id'] ?></td>
                    <td><img src="<?= $product['image']?>" alt="Image of <?= $product['name']?>"></td>
                    <td><a href="products/show/<?= $product['product_id'] ?>"><?= $product['name']?></a></td>
                    <td><?= $product['product_quantity']?></td>
                    <td><?= $product['quantity_sold']?></td>
<?php if(isset($admin)){?>
                    <td><a href="<?= base_url('products/edit/' .$product['product_id'])?>">Edit</a> | <a href="<?= base_url('products/remove/'.$product['product_id'])?>">Remove</a></td>
<?php }?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>