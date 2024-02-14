<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
	<title>Search</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>

	</script>
</head>

<body>
	<header>
		<form>
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
			<input type="text" name="name" placeholder="Item name">
			<input type="number" name="min" placeholder="Min">
			<input type="number" name="max" placeholder="Max">
			<select>
				<option value="ASC">Low to High Price</option>
				<option value="DESC">High to Low Price</option>
			</select>
		</form>
	</header>
	<main>
		
	</main>
</body>

</html>