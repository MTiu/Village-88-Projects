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

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px 30px;
        }

        th {
            font-weight: 1000;
        }

        .row1 {
            color: #D0312D;
        }

        .row2 {
            color: #3944BC;
        }
    </style>
    <title>Bingo</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th class="row2">B</th>
                <th class="row2">I</th>
                <th class="row2">N</th>
                <th class="row2">G</th>
                <th class="row2">O</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 2; $i <= 6; $i++) {
                if ($i % 2 == 0) {
                    echo "<tr class = 'row1'>";
                } else {
                    echo "<tr class = 'row2'>";
                }
                for ($j = 1; $j <= 5; $j++) {
                    $num = $i * $j;
                    echo "<td>$num</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>