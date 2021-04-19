<?php
    include 'header.php';
?>

<section class = "main-signup">
	<div class = "login-body">
		<div class = "login-title">Conecteaza-te<br>
			<div class = "sign-up-title">Nu ai un cont? <a href="signup.php">Creeaza unul</a></div>
		</div>
		<form class = "login-form" action = "includes/login.inc.php" method = "POST">

			<div class = "user">
			<div class = "logo"><i class="fa fa-users"></i></div>
			<input type="text" name="uid" placeholder="Username">
			<?php
			if(isset($_GET["login"]))
			{
				if($_GET["login"] == "usertaken")
				{
					echo '
					<div class ="sgn-err">*Acest username este deja folosit!</div>
					<style>
						.login-body .login-form .user input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
			}
			?>
			</div>

			<div class = "password">
			<div class = "logo"><i class="fa fa-lock"></i></div>
			<input type="password" name="pwd" placeholder="Password">
			<?php
			if(isset($_GET["login"]))
			{
				if($_GET["login"] == "pwderror")
				{
					echo '
					<div class ="sgn-err">*Nu ai introdus parola corecta!</div>
					<style>
						.login-body .login-form .password input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
				if($_GET["login"] == "error")
				{
					echo '
					<div class ="sgn-err">*Nu ai completat toate campurile obligatorii!</div>
					<style>
						.login-body .login-form input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
				if($_GET["login"] == "err-log")
				{
					echo '
					<div class ="sgn-err">*Nu exista niciun cont asociat cu aceste date!</div>
					<style>
						.login-body .login-form input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
			}
			?>
			</div>

			<button type="submit" name ="submit">Login</button>
		</form>
	</div>
</section>

<?php
    include 'footer.php';
?>