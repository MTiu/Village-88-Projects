<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css" />
    <script src="jquery.bubble.js"></script>
    <script src="bubbleBody.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>THE Blogger</title>
</head>

<body>
    <header class="blogger-header">
        <h1>THE Blogger</h1>
        <section>
            <h2>Welcome! </h2>
            <h2> <?= (isset($_SESSION['first_name'])) ? $_SESSION['first_name'] : "Guest!" ?></h2>
            <a href="process.php">Log Out</a>
        </section>
        <?php if ((!empty($_SESSION['error-array'])) || (!empty($_SESSION['reg-suc']))) { ?>
            <section>
                <h2>Error Tab:</h2>
                <p class="success-text"><?= (isset($_SESSION['reg-suc'])) ? $_SESSION['reg-suc'] : "" ?></p>
                <p class="error-text"><?= (isset($_SESSION['review-error'])) ? $_SESSION['review-error'][0] : "" ?></p>
                <p class="error-text"><?= (isset($_SESSION['reply-error'])) ? $_SESSION['reply-error'][0] : "" ?></p>
            </section>
        <?php }
        unset($_SESSION['reg-suc']);
        unset($_SESSION['reply-error']);
        unset($_SESSION['review-error']);
        ?>
    </header>
    <main id="blogger-body">
        <section class="blog-content">
            <h1>Hello! Welcome to THE Blogger </h1>
            <div class="hero">
                <img src="img/tenten.jpg" alt="">
                <article>
                    <h2>This is MagiRevo/転生王女と天才令嬢の魔法革命</h2>
                    <p>This is one of my favorite anime of 2023 and the info displayed here was taken from <a href="https://myanimelist.net/anime/52736/Tensei_Oujo_to_Tensai_Reijou_no_Mahou_Kakumei">MyAnimeList.net</a> </p>
                    <p>Princess Anisphia "Anis" Wynn Palletia has always dreamed of flying through the sky, even though the people of her kingdom consider it a silly ambition. Also at odds with her goal is the fact that Anis is incapable of using magic despite her noble status. Refusing to give up so easily, she renounces her right to the throne, and focuses on developing "magicology" by combining various resources with knowledge from her previous life on Earth.</p>
                </article>
            </div>
        </section>

        <?php if (isset($_SESSION['logged_in'])) { ?>
            <section class="write-review">
                <h1>Leave a Review?</h1>
                <form action="process.php" method="post">
                    <textarea class="review-textarea" name="review-message"></textarea>
                    <input type="submit" name='review' value='Review'>
                </form>
            </section>
        <?php  } ?>
        <?php if (isset($_SESSION['reviews'])) { ?>
            <?php foreach ($_SESSION['reviews'] as $review) { ?>
                <section class="review-body">
                    <h2> <?= $review['full_name'] . " (" . $review['created_at'] . ")"  ?></h2>
                    <p> <?= $review['content']  ?> </p>
                    <section class="reply-body">
                        <?php foreach ($_SESSION['replies'] as $reply) {
                            if ($review['review_id'] == $reply['review_id']) { ?>
                                <h2><?= $reply['full_name'] . " (" . $reply['created_at'] . ")"   ?></h2>
                                <p><?= $reply['content'] ?> </p>
                        <?php }
                        } ?>
                        <?php if (isset($_SESSION['logged_in'])) { ?>
                            <form action="process.php" method="post">
                                <textarea class="reply-textarea" name="reply-message"></textarea>
                                <input type="hidden" name='review-id' value=<?= $review['review_id'] ?>>
                                <input class="reply-button" type="submit" name='reply' value='Reply'>
                            <?php  } ?>
                            </form>
                    </section>
                </section>
        <?php }
        } ?>
    </main>
</body>

</html>