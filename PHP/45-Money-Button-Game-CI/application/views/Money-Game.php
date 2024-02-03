<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css') ?>">
    <title>Money Button Game</title>
</head>
<body>
    <header>
        <section>
            <h1>Your Money: <?php echo ($post)? $post['money']: "500" ?></h1>
            <h2>Your Chances: <?php echo ($post)? $post['chance']: "10" ?></h2>
        </section>
        <a href="<?php echo base_url('reset') ?>">Reset Game</a>
    </header>
    <main>
<?php foreach($page as $datum){ ?>
        <form action="<?php echo base_url() ?>" method="post">
            <h3><?php echo $datum['name']?></h3>
            <img src="<?php echo base_url("assets/img/{$datum['picture']}") ?>" alt="Picture of <?php echo $datum['picture'] ?>">
<?php if($post == TRUE && $post['chance'] <= 0){?>
            <p class="game-over">NO CHANCES LEFT</p>
<?php }else if($post == TRUE && $post['money'] < 0){?>
            <p class="game-over">YOU OWE ME!</p>
<?php } else {?>
            <input type="submit" name="<?php echo $datum['name']?>" value="Bet">
<?php } ?>
            <p><?php echo $datum['price']?></p>
        </form>
<?php }?>
    </main>
    <footer>
        <img class="host" src="<?php if($post){
            echo base_url("assets/img/{$post['host']}");
        } else {
            echo base_url('assets/img/waving.gif');
        } ?>" alt="host image">
        <section>
            <h1>Game Host:</h1>
            <div class="messages">
                <p><?php echo $initDate ?> ゲームスタート！！ Welcome to Money Button Game, risk taker! All you need to do is to push buttons to try your luck. You have free 10 chances with initial money 500. Choose wisely and good luck!</p>
<?php if($post){foreach($post['msg'] as $value){ ?>
<?php echo $value; ?>
<?php } } ?>
            </div>
        </section>
    </footer>
</body>
</html>