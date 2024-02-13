<?php foreach($orders as $order) {?>
		<section class="order">
			<form action="ajax/remove/<?= $order['id']?>" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
				<input type="submit" value="X">
			</form>
			<h1><?= $order['id']?></h1>
			<form action="ajax/update/<?= $order['id']?>" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
				<p name="description" class="description"><?= $order['description']?></p>
			</form>
		</section>
<?php } ?>