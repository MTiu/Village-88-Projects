<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Feedback Form</title>
</head>

<body>
    <form action="result.php" method="POST">
        <h1>Feedback Form</h1>
        <label>
            Your Name(optional):
            <input type="text" name="name" placeholder="Insert Name">
        </label>
        <p>Course Title:</p>
        <select name="course">
            <option value="PHP Track">PHP Track</option>
            <option value="CSS Track">CSS Track</option>
            <option value="HTML Track">HTML Track</option>
            <option value="JavaScript Track">JavaScript Track</option>
        </select>
        <p>Given Score (1-10):</p>
        <select class="score-select" name="score">
            <option value="1pts">1</option>
            <option value="2pts">2</option>
            <option value="3pts">3</option>
            <option value="4pts">4</option>
            <option value="5pts">5</option>
            <option value="6pts">6</option>
            <option value="7pts">7</option>
            <option value="8pts">8</option>
            <option value="9pts">9</option>
            <option value="10pts">10</option>
        </select>
        <p>Reason:</p>
        <textarea name="reason" placeholder="Insert your inner thoughts"></textarea>
        <input class="submit-button" type="submit" value="Submit">
    </form>
    <img src="img/maple.png" class="maple" alt="image of maple">
</body>

</html>