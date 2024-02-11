	
	<main class="access">
		<h1>Login</h1>
		<form action="Users/loginProcess" method="post">
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
			<label>
				Email Address:
				<input type="text" name="email">
				<?= (isset($validation['email'])) ? $validation['email'] : '' ?>
			</label>
			<label>
				Password:
				<input type="password" name="password">
				<?= (isset($validation['password'])) ? $validation['password'] : '' ?>
			</label>
			<input type="submit" value="Login">
		</form>
		<a href="<?= $access ?>">Don't have an account? Register Here!</a>
	</main>
</body>
</html>
