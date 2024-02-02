<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo base_url('assets/style.css')?> >
    <title>Success!</title>
</head>
<body>
    <main>
    <h1>Submitted Entry</h1>
    <p>Your Name (Optional):</p> <?php echo $data['name']?>
    <p>Course Tile:</p> <?php echo $data['course']?>
    <p>Given Score(1-10):</p> <?php echo $data['score']?>
    <p>Reason:</p> <?php echo $data['reason']?>
    <a href="submitForm">Return</a>
    </main>
</body>
</html>