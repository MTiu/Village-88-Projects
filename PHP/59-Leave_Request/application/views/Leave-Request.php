<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/style.css')?>">
	<title>Leave Requests</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(document).on('submit','form',function(){
				$.post($(this).attr('action'),$(this).serialize(),function(data){
					$('main').html(data);
				})
				$.post('<?= base_url('Requests/count')?>',$(this).serialize(),function(data){
					$('header h1').html(data);
				},'json')
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
		<h1></h1>
		<form action="<?= base_url('requests')?>" method="post">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
			<label>
				<input type="radio" id="recent" name="request_time" value="recent"> Most Recent
			</label>
			<label>
				<input type="radio" id="old" name="request_time" value="old"> Old Requests
			</label>
			<select name="vacation">
				<option value="Vacation">Vacation</option>
				<option value="Sick Leave">Sick Leave</option>
				<option value="Unpaid Leave">Unpaid Leave</option>
				<option value="Paid Leave">Paid Leave</option>
				<option value="Half Day Unpaid">Half Day Unpaid</option>
			</select>
		</form>
	</header>
	<main></main>
</body>
</html>
