<?php
session_start();
ini_set('auto_detect_line_endings', true);
$pageItems = 50;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($page - 1) * $pageItems;
function pageCounter($file){
    $handler = fopen($file, "r");
        $csvRowCount = 0;
            if ( $handler !== FALSE) { $csvRowCount = 0;
            while (($data = fgetcsv($handler)) !== FALSE) { 
                $csvRowCount++;
            }
        }fclose($handler);
        return $csvRowCount = ceil($csvRowCount/52);
    }

$totalPages = pageCounter("uploads/".$_SESSION['csv-name']);
$csvhandler = fopen("uploads/".$_SESSION['csv-name'], "r");
$header = fgetcsv($csvhandler);

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
<?php for ($i = 0; $i < count($header); $i++) { ?>
                <th><?= $header[$i]?></th>
<?php } ?>
                </tr>
            </thead>
<?php if ( $csvhandler !== FALSE) { $rowCount = 0; ?>
<?php while (($data = fgetcsv($csvhandler)) !== FALSE) { ?>
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
<?php for($i=1; $i<=$totalPages; $i++){ ?>
            <a href="?page= <?= $i ?>"> <?=$i?></a>
<?php }?>
        </div>
</body>
</html>