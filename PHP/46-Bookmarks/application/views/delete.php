<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <title>Delete Bookmarks</title>
</head>

<body>
    <main class="delete">
        <h1>Are you sure you want to delete?</h1>
        <h2><?php echo "{$favorite[0]['folder']}/{$favorite[0]['name']} (<a href='{$favorite[0]['url']}'> {$favorite[0]['url']} </a>)" ?></h2>
        <a class="button" href="<?php echo base_url() ?>">No</a>
        <a class="button-delete" href="<?php echo base_url("bookmarks/deleteProcess/$id") ?>">YES DELETE!</a>
    </main>
</body>

</html>