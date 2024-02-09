<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css')?>">
	<title>Fire Emblem</title>
</head>

<body>
	<main>
	<h1>Fire Emblem Filter</h1>
		<section class="search">
			<form action="<?= base_url('process') ?>" method="post">
				<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" /> 
				<label>
					<span class="emphasize">Search characters</span>
					<input type="text" name="character-name">
				</label>
<?php if(isset($error)){ echo $error[0]; }?>
				<p>Gender</p>
				<label>
					<input type="checkbox" name="gender[]" value="m">
					Male
				</label>
				<label>
					<input type="checkbox" name="gender[]" value="f">
					Female
				</label>
				<p>Weapons</p>
				<label>
					<input type="checkbox" name="weapon[]" value="1">
					Sword
				</label>
				<label>
					<input type="checkbox" name="weapon[]" value="2">
					Axe
				</label>
				<label>
					<input type="checkbox" name="weapon[]" value="3">
					Magic
				</label>
				<label>
					<input type="checkbox" name="weapon[]" value="4">
					Bow
				</label>
				<label>
					<input type="checkbox" name="weapon[]" value="5">
					Lance
				</label>
				<label>
					<input type="checkbox" name="weapon[]" value="6">
					Special
				</label>
				<input type="submit">
			</form>
		</section>
		<section class="characters">
<?php foreach ($data as $characters) { ?>
				<div class="image-cont">
					<img src=<?= $characters['image'] ?> alt="Image of <?= $characters['image'] ?>">
					<p><?= $characters['first_name'] ." ". $characters['last_name']?></p>
				</div>
<?php } ?>
			</section>
		</section>
	</main>
</body>
</html>
