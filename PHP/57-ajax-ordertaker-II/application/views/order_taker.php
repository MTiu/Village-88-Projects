<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
	<title>OrderTaker2</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>

	</script>
</head>

<body>
	<main>
		<h1>Order Queue:</h1>
<?php foreach($orders as $order) {?>
		<section class="order">
			<form action="ajax/remove/<?= $order['id']?>" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
				<input type="submit" value="X">
			</form>
			<h1><?= $order['id']?></h1>
			<form action="ajax/update/<?= $order['id']?>" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
				<textarea name="description"><?= $order['description']?></textarea>
				<input type="submit">
			</form>
		</section>
<?php } ?>
	</main>
	<footer>
		<form action="ajax/put_order" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
			<input type="text" name='order'>
			<input type="submit">
		</form>
	</footer>
</body>
</html>