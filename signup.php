<?php
    include 'header.php';
?>

<section class = "main-signup">
	<div class = "sign-up-body">
		<div class = "sign-up-title">Creeaza un cont<br>
			<div class = "login-title">Ai deja un cont? <a href="login.php">Conecteaza-te</a></div>
		</div>
		<form class = "signup-form" action = "includes/signup.inc.php" method = "POST">

			<div class = "first">
			<div class = "logo"><i class="fa fa-user"></i></div>
			<input type="text" name="first" placeholder="First name">
			<?php
			if(isset($_GET["signup"]))
			{
				if($_GET["signup"] == "invalid-first")
				{
					echo 
					'
					<div class ="sgn-err">*Numele tau contine caractere nepermise!</div>
					<style>
						.sign-up-body .signup-form .first input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
			}
			?>
			</div>

			<div class = "last">
			<div class = "logo"><i class="fa fa-user"></i></div>
			<input type="text" name="last" placeholder="Last name">
			<?php
			if(isset($_GET["signup"]))
			{
				if($_GET["signup"] == "invalid-last")
				{
					echo '
					<div class ="sgn-err">*Prenumele tau contine caractere nepermise!</div>
					<style>
						.sign-up-body .signup-form .last input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
			}
			?>
			</div>

			<div class = "email">
			<div class = "logo"><i class="fa fa-envelope"></i></div>
			<input type="text" name="email" placeholder="E-mail">
			<?php
			if(isset($_GET["signup"]))
			{
				if($_GET["signup"] == "email-fail")
				{
					echo '
					<div class ="sgn-err">*Nu ai introdus o adresa de e-mail valida!</div>
					<style>
						.sign-up-body .signup-form .email input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
				else if($_GET["signup"] == "email-taken")
				{
					echo '
					<div class = "sgn-err">*E-mail-ul introdus este deja folosit!</div>
					<style>
						.sign-up-body .signup-form .email input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
			}
			?>
			</div>

			<div class = "user">
			<div class = "logo"><i class="fa fa-users"></i></div>
			<input type="text" name="uid" placeholder="Username">
			<?php
			if(isset($_GET["signup"]))
			{
				if($_GET["signup"] == "usertaken")
				{
					echo '
					<div class ="sgn-err">*Acest username este deja folosit!</div>
					<style>
						.sign-up-body .signup-form .user input
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
			if(isset($_GET["signup"]))
			{
				if($_GET["signup"] == "empty")
				{
					echo '
					<div class ="sgn-err">*Nu ai completat toate campurile obligatorii!</div>
					<style>
						.sign-up-body .signup-form input
						{
							border-bottom-color: #560d7c;
						}
					</style>
					';
				}
			}
			?>
			</div>

			<button type="submit" name ="submit">Sign up</button>
		</form>
	</div>
</section>

<?php
    include 'footer.php';
?>