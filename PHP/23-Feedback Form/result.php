<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Feedback Form</title>
</head>

<body>

    <form action="Feedback Form.php" method="POST" class="result-form">
        <h1>Submitted Entry</h1>
        <p>Name: <span><?= $_POST['name'] ?></span></p>
        <p>Course Title: <span><?= $_POST['course'] ?></span></p>
        <p>Given Score (1-10): <span><?= $_POST['score'] ?></span></p>
        <p>Reason:</p>
        <p class="paragraph-result"><span><?= $_POST['reason'] ?></span></p>
        <input class="return-button" type="submit" value="Return">
    </form>
    <img src="img/maple-smile.png" class="maple-smile" alt="image of maple">
</body>

</html>