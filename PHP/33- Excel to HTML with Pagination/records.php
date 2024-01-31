<?php
session_start();
$pageItems = 50;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($page - 1) * $pageItems;


// $totalPages = pageCounter($_SESSION['csv-name']);
// $csvhandler = fopen($_SESSION['csv-name'], "r");
// $header = fgetcsv($csvhandler);
var_dump($_SESSION['csv-name']);
var_dump($_SESSION['header']);
var_dump($_SESSION['csv-handler']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Records</title>
</head>
<body>
    <h1><?= $_SESSION['csv-name']?></h1>
    <a href="Excel to HTML with Pagination.php">Return</a>
    <section class="table-body">
        <table>
            <thead>
                <tr>
<?php for ($i = 0; $i < count($_SESSION['header']); $i++) { ?>
                <th><?= $_SESSION['header'][$i]?></th>
<?php } ?>
                </tr>
            </thead>
<?php if ( $_SESSION['csv-handler'] !== FALSE) { $rowCount = 0; ?>
<?php while (($data = fgetcsv($_SESSION['csv-handler'])) !== FALSE) { ?>
<?php if ($rowCount >= $startIndex && $rowCount < ($startIndex + $pageItems)) { ?>
            <tbody>
                <tr>
<?php for ($i = 0; $i < count($data); $i++) { ?>
                <td><?= $data[$i]?></td>
<?php } ?>
                </tr>
            </tbody>
<?php }$rowCount++; ?>
<?php if ($rowCount >= ($startIndex + $pageItems)) break;
}
}?>
        </table>
    </section>
        <div class="pages">
<?php for($i=1; $i<=$_SESSION['total-pages']; $i++){ ?>
            <a href="?page= <?= $i ?>"> <?=$i?></a>
<?php }?>
        </div>
</body>
</html>