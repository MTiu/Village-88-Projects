<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        section {
            text-align: center;
            width: 29%;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px 30px;
        }

        th {
            font-weight: 1000;
        }

        .color1 {
            color: #D0312D;
        }

        .color2 {
            color: #3944BC;
        }
    </style>
    <title>Bingo</title>
</head>

<body>
    <section>
        <h1>B I N G O</h1>
        <table>
            <tbody>
                <?php
                $counter = 0;
                for ($i = 2; $i <= 6; $i++) {
                ?>
                    <tr>
                        <?php
                        for ($j = 1; $j <= 5; $j++) {
                            $num = $i * $j;
                            if ($counter == 0) {
                                $counter++;
                        ?>
                                <td class="color1"><?= $num ?></td>
                            <?php } else {
                                $counter--;
                            ?>
                                <td class="color2"><?= $num ?></td>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </section>
</body>

</html>