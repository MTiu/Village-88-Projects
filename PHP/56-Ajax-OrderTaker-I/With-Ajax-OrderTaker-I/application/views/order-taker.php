<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
	<title>Order Taker</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){

			$.get('<?= base_url('ajax/order_list')?>', function(res) {
				$('#orders').html(res);
			});
			$('form').submit(function(){
				$.post('<?= base_url('ajax/order')?>', $(this).serialize(), function(res){
					$('#orders').html(res);
					console.log(res);
				});
				return false;
			});
		});
	</script>
</head>

<body>
	<h1>Order Queue:</h1>
	<main>
	<div id="orders"></div>
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