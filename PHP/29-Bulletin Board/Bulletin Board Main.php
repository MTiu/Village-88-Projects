<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Bulletin Board</title>
</head>


<body>
    <main class="success-dashboard">
        <h1 class="title">Bulletin Board</h1>
        <div class="container">
            <?php
            if (isset($_SESSION['posts'])) {
                foreach ($_SESSION['posts'] as $post) {
                    $date = date_create($post['created_at']); ?>
                    <section>
                        <h1><?= date_format($date, "m/d/Y"); ?></h1>
                        <h1><?= "- " . $post['post_name'] ?></h1>
                        <p class="post-details"><?= $post['post_detail'] ?></p>
                    </section>
            <?php
                }
            } ?>
        </div>
        <form action="process.php" method="POST">
            <input class="submit-button" type="submit" value="Return" name="return">
        </form>
    </main>
</body>

</html>