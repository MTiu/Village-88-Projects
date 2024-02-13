<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
	<title>Order Taker</title>
</head>

<body>
	<h1>Order Queue:</h1>
<?= (isset($errors) ? $errors : '')?>
	<main>
<?php foreach($orders as $order){?>
		<section class="orders">
			<h1><?= $order['id']?></h1>
			<p><?= $order['description']?></p>
		</section>
<?php } ?>
	</main>
	<footer>
		<form action="Ajax/order" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
			<input type="text" name="order" placeholder="Type customers' order here!">
			<input type="submit">
		</form>
	</footer>
</body>

</html>