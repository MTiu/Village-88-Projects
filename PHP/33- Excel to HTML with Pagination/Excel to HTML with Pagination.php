<?php
require('new-connection.php');
session_start();
$_SESSION['uploaded-files'] = fetch_all("SELECT name FROM files");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Excel to HTML with Pagination</title>
</head>

<body>
    <main>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <label>
                <input type="file" name="csv-file">
            </label>
<?php if (!empty($_SESSION['file-error'])) { ?>
                    <p class="error"><?= $_SESSION['file-error'] ?></p>
<?php } else if(!empty($_SESSION['success'])){ ?>
                    <p class="success">The File was successfuly uploaded</p>
<?php } unset($_SESSION['file-error']);?>
                <input type="submit" value="Upload">
        </form>
        <h1>Uploaded Files</h1>
        <ol>
            <?php foreach($_SESSION['uploaded-files'] as $arr){ foreach($arr as $csvName){?>
            <li><a href="process.php?name=<?=$csvName?>"><?= $csvName ?></a></li>
<?php }}?>
        </ol>
    </main>
</body>

</html>