<?php
ini_set('auto_detect_line_endings', true);
$count = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Excel to HTML</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>company_name</th>
                <th>full_address</th>
                <th>phone1</th>
                <th>phone2</th>
                <th>email_address</th>
                <th>website</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (($handle = fopen("us-500.csv", "r")) !== FALSE) {
            ?>
                <?php
                while (($data = fgetcsv($handle)) !== FALSE) {
                ?>
                    <tr <?= ($count % 11 == 0) ? "class= 'colored-row'" : "" ?>>
                        <?php
                        if ($count >= 2) {
                            for ($i = 0; $i < count($data); $i++) {
                        ?>
                                <?php
                                if ($i == 3) {
                                ?>
                                    <td><?= $data[$i] . " " . $data[$i + 1] . " " . $data[$i + 2] . " " . $data[$i + 3] ?></td>
                                <?php $i += 4;
                                } else {
                                ?>
                                    <td><?= $data[$i] ?></td>
                                <?php } ?>
                            <?php } ?>
                    <?php  }
                        $count++;
                    }
                    fclose($handle); ?>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</body>

</html>