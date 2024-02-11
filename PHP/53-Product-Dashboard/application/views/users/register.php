	
	<main class="access">
		<h1>Register</h1>
		<form action="<?= base_url('Users/regProcess')?>" method="post">
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
			<label>
				Email Address:
				<input type="text" name="email">
				<?= (isset($validation['email'])) ? $validation['email'] : '' ?>
			</label>
			<label>
				First name:
				<input type="text" name="fname">
				<?= (isset($validation['fname'])) ? $validation['fname'] : '' ?>
			</label>
			<label>
				Last name:
				<input type="text" name="lname">
				<?= (isset($validation['lname'])) ? $validation['lname'] : '' ?>
			</label>
			<label>
				Password:
				<input type="password" name="password">
				<?= (isset($validation['password'])) ? $validation['password'] : '' ?>
			</label>
			<label>
				Confirm Password:
				<input type="password" name="conf-password">
				<?= (isset($validation['conf-password'])) ? $validation['conf-password'] : '' ?>
			</label>
			<input type="submit" value='Register'>
		</form>
		<a href="<?= $access ?>">Already have an account?</a>
	</main>
</body>
</html>
