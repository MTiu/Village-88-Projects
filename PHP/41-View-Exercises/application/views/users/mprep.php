<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= <?= base_url('assets/css/main.css')?>>
    <title>Mprep</title>
</head>
<body>
    <p><?php echo "&lt;<span class='emphasis'>h1</span>&gt;$name &lt;/<span class='emphasis'>h1</span>&gt"?></p>
    <p><?php echo "&lt;<span class='emphasis'>h2</span>&gt;User Age: $age, Location: $location &lt;/<span class='emphasis'>h2</span>&gt"?></p>
    <p><?php $total = count($hobbies); echo "&lt;<span class='emphasis'>h3</span>&gt; $total Hobbies &lt;/<span class='emphasis'>h3</span>&gt"?></p>
    <p><?php echo "&lt;<span class='emphasis'>ul</span>&gt; "?></p>
<?php for($i=0; $i<count($hobbies); $i++){?>
    <p class="tab"><?php echo "&lt;<span class='emphasis'>li</span>&gt;{$hobbies[$i]} &lt;/<span class='emphasis'>li</span>&gt"?></p>
<?php }?>
    <p><?php echo "&lt;/<span class='emphasis'>ul</span>&gt; "?></p>
</body>
</html>