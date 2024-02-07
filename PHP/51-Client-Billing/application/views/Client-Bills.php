<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <title>Client Bills</title>
    <script>
        $(document).ready(function() {
            var data = <?php echo json_encode($data)?>;
            var options = {
                title: {
                    text: "Client Billing 2011"
                },
                data: [{
                    type: "column",
                    dataPoints: [
                        <?php foreach($data as $values) {?>
                        {
                            label: "<?= $values['Month'] ?>",
                            y: <?= $values['Amount'] ?>
                        },
                        <?php }?>
                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);
        });
    </script>
</head>

<body>
    <main>
        <h1>List of total charges per month for client No. 1</h1>
        <table>
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $value) { ?>
                    <tr>
                        <td><?= $value['Month'] ?></td>
                        <td><?= $value['Year'] ?></td>
                        <td><?= $value['Amount'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </main>
</body>

</html>