
<?= (isset($success)) ? $success : '' ?>
<?= (isset($validation['review'])) ? $validation['review'] : '' ?>
<?= (isset($validation['reply'])) ? $validation['reply'] : '' ?>
    <main class="product">
        <section class="product-cont">
            <h1><?= $product['name']?> (&#8369 <?= $product['price']?>)</h1>
            <img src="<?= $product['image']?>" alt="Image of <?= $product['name']?> ">
            <section class="product-info">
                <h2>Product Information</h2>
                <p>Product ID: #<?= $product['product_id']?> </p>
                <p>Added since: <?= date('F j, Y', strtotime($product['created_at'])) ?> </p>
                <p>Number of available stocks: <?= $product['product_quantity']?> </p>
                <p>Total Sold: <?= $product['quantity_sold']?> </p>
                <section>
                    <h2>Description: </h2>
                    <p><?= $product['product_description']?> </p>
                </section>
            </section>
        </section>
        <section class="post-review">
            <h2>Leave a Review</h2>
            <form action="<?= base_url('Products/reviewProcess/'. $product['product_id'])?>" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <textarea name="review"></textarea>
                <input type="submit" value="Post">
            </form>
        </section>
<?php if(isset($reviews)){?>
<?php foreach($reviews as $review){?>
        <section class="review">
                <h3><?= $review['user']?> Wrote:</h3>
                <p class="date"><?= $review['date']?></p>
                <p class="review-desc"><?= $review['review']?></p>
<?php foreach($replies as $reply) {?>
<?php if($reply['review_id'] == $review['review_id']){ ?>
            <section class="reply-cont">
                <h3><?= $reply['user']?> Wrote:</h3>
                <p class="date"><?= $reply['date']?></p>
                <p class="reply-desc"><?= $reply['reply']?></p>
            </section>
                <?php }?>
                <?php }?>
            <form class="post-reply" action="<?= base_url('Products/replyProcess/'. $product['product_id'].'/'.$review['review_id'])?>" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <textarea name="reply" placeholder="Write a message"></textarea>
                <input type="submit" value="Post">
            </form>
        </section>
<?php }?>
<?php }?>
    </main>
</body>
</html>