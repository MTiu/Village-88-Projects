<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;

        }

        th,
        td {
            text-align: left;
            border: 1px solid black;
            padding: 5px 20px 5px 2px;
        }

        .thirdRow {
            background-color: lightgray;
        }
    </style>
    <title>Credit Card</title>
</head>

<body>
    <?php
    $users = array(
        array('cardholder_name' => "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
        array('cardholder_name' => "John Supsupin", 'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
        array('cardholder_name' => "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
        array('cardholder_name' => "Mark Guillen", 'cvc' => 345, 'acc_num' => '123 123 123 123'),
    )
    ?>
    <h1>1st Table</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Name in uppercase</th>
                <th>Account Num</th>
                <th>CVC Num</th>
                <th>Full account</th>
                <th>Length of full account</th>
                <th>Is valid</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $key => $user) {
                $fullAccount = $user['acc_num'] . " " . $user['cvc'];
                $length = str_replace(" ", '', $fullAccount);
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $user['cardholder_name'] ?></td>
                    <td><?= strtoupper($user['cardholder_name']) ?></td>
                    <td><?= $user['acc_num'] ?></td>
                    <td><?= $user['cvc'] ?></td>
                    <td><?= $fullAccount ?></td>
                    <td><?= strlen($length) ?></td>
                    <td><?= (strlen($length) == 19) ? "yes" : "no" ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    array_push(
        $users,
        array('cardholder_name' => "Jonas Arthur", 'cvc' => 789, 'acc_num' => '123 123 321 222'),
        array('cardholder_name' => "Mary Catherines", 'cvc' => 243, 'acc_num' => '888 667 555 999'),
        array('cardholder_name' => "Azusa Toyama", 'cvc' => 205, 'acc_num' => '123 123 123 123 1111'),
        array('cardholder_name' => "Kenny Matthews ", 'cvc' => 389, 'acc_num' => '222 333 444 555'),
        array('cardholder_name' => "Cisco McGullet", 'cvc' => 452, 'acc_num' => '777 888 999 696 2341'),
    )
    ?>


    <h1>2nd Table</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Name in uppercase</th>
                <th>Account Num</th>
                <th>CVC Num</th>
                <th>Full account</th>
                <th>Length of full account</th>
                <th>Is valid</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $key => $user) {
                $fullAccount = $user['acc_num'] . " " . $user['cvc'];
                $length = str_replace(" ", '', $fullAccount);
            ?>
                <tr <?= (($key + 1) % 3 == 0) ? "class = 'thirdRow'" : " " ?>>
                    <td><?= $key + 1 ?></td>
                    <td><?= $user['cardholder_name'] ?></td>
                    <td><?= strtoupper($user['cardholder_name']) ?></td>
                    <td><?= $user['acc_num'] ?></td>
                    <td><?= $user['cvc'] ?></td>
                    <td><?= $fullAccount ?></td>
                    <td><?= strlen($length) ?></td>
                    <td><?= (strlen($length) == 19) ? "yes" : "no" ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>