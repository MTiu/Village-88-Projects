<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo base_url('assets/style.css')?> >
    <title>Success!</title>
</head>
<body>
    <img class="submitted-img" src="<?php echo base_url('assets/rem submitted.png')?>" alt="Picture of Rem">
    <main class="submitted-feedback">
    <h1>Submitted Entry</h1>
    <section>
        <p>Your Name (Optional): </p> 
        <p>Course Tile: </p> 
        <p>Given Score(1-10): </p> 
    </section>
    <section class="answer-box">
        <p class="answer">
        <?php if(empty($data['name'])){
            echo 'N/A';
        } else {
            echo $data['name'];
        }?>
        </p>
        <p class="answer">
        <?php if(empty($data['course'])){
            echo 'N/A';
            } else {
                echo $data['course'];
            }?>
        </p>
        <p class="answer">
        <?php if(empty($data['score'])){
                echo 'N/A';
            } else {
                echo $data['score'];
            }?>
        </p>
    </section>
    <p>Reason:</p> 
    <p class="reason">
    <?php if(empty($data['reason'])){
            echo 'N/A';
        } else {
            echo $data['reason'];
        }?>
    </p>
    <a href="submitForm">Return</a>
    </main>
</body>
</html>