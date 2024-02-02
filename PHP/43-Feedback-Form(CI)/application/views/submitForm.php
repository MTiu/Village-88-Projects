<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo base_url('assets/style.css')?> >
    <title>Submit Feedback</title>
</head>
<body>
    <img class="submit-img" src="<?php echo base_url('assets/rem submitting.png')?>" alt="Picture of Rem">
    <main>
    <h1>Feedback Form</h1>
    <form class="feedback" action="success" method="post">
        <label>
            Your Name (Optional):
            <input type="text" name='name' placeholder="Your Name">
        </label>
        <p>Course Title:</p>
        <select name="course" class="course">
            <option value="PHP Track" name='php'>PHP Track</option>
            <option value="CSS Track" name='css'>CSS Track</option>
            <option value="HTML Track" name='html'>HTML Track</option>
            <option value="JavaScript Track" name='js'>JavaScript Track</option>
        </select>
        <p>Given Score:</p>
        <select name="score">
            <option value="1" name="score1">1</option>
            <option value="2" name="score2">2</option>
            <option value="3" name="score3">3</option>
            <option value="4" name="score4">4</option>
            <option value="5" name="score5">5</option>
            <option value="6" name="score6">6</option>
            <option value="7" name="score7">7</option>
            <option value="8" name="score8">8</option>
            <option value="9" name="score9">9</option>
            <option value="10" name="score10">10</option>
        </select>
        <p>Reason:</p>
        <textarea name="reason" placeholder="Place your inner thoughts Here!"></textarea>
        <input type="submit" class="submit-button">
    </form>
    </main>
</body>
</html>