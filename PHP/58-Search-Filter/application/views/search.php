<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
	<title>Search</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(document).on('submit','form',function(){
				var form = $(this);
				$.post(form.attr('action'),form.serialize(),function(data){
					$('tbody').html(data);
				})
				return false;
			})

			$(document).on('change','form input, form select', function(){
				$(this).parent().submit();
			})
			$('form').submit();
		});
	</script>
</head>

<body>
	<header>
		<form action="<?= base_url('Search_Filter/search')?>" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
			<input type="text" name="name" placeholder="Search by name">
			<input type="number" name="min" placeholder="Min"> -
			<input type="number" name="max" placeholder="Max">
			<select name="order">
				<option value="ASC">Low to High Price</option>
				<option value="DESC">High to Low Price</option>
			</select>
		</form>
	</header>
	<main>
		<table>
			<thead>
				<tr>
					<th>Item name</th>
					<th>Number of stock</th>
					<th>Price</th>
					<th>Date Added</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</main>
</body>

</html>