<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
	<title>OrderTaker2</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(document).on('submit','form',function(){
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(data){
					$('#order-list').html(data);
				});
				return false;
			});

			$(document).on('change','form .description', function(){
				$(this).parent().submit();
			});

			$(document).on('blur','form .description', function(){
				$(this).replaceWith($('<p>', { class: 'description', text: $(this).val() }));
			});

			$(document).on('click','p', function(){
				$(this).replaceWith($('<textarea>', {name:'description', class: 'description', text: $(this).text() }));
			})
			$('form').submit();
		});
	</script>
</head>

<body>
	<main>
		<h1>Order Queue:</h1>
		<div id="order-list">
		
		</div>
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