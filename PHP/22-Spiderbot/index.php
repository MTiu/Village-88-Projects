<?php
$url = "http://www.bing.com/search?q=software+engineer";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);

require("simple_html_dom.php");
$html = str_get_html($data);
$content = $html->find('h2 a');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Spider Bot</title>
</head>

<body>
    <main>
        <h1>Spider 蜘 Bot</h1>
        <img src="spider.gif" alt="Spider Bot">
        <h2>Top 5 Results</h2>
        <ol>
            <?php
            for ($i = 0; $i < 5; $i++) {
            ?>
                <li>
                    <h3><?= $content[$i]->innertext ?></h3>
                </li>
                <a href=<?= "'" . $content[$i]->href . "'" ?>> <?= $content[$i]->href ?></a>
            <?php } ?>
        </ol>
    </main>
</body>

</html>