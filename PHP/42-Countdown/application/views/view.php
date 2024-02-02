<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= base_url('assets/style.css')?>>
    <title>Countdown</title>
</head>
<body>
    <main>
        <h1>COUNTDOWN</h1>
        <p><?php echo $date['seconds']?> Seconds Left before the day ends!</p>
        <p><?php echo $date['today']?></p>
    </main>
</body>
</html>