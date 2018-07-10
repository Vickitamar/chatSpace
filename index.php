<?php
require('core/init.php');


?>

<!DOCTYPE html>
<html>
<head>
	<title>chat-space</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<div class="loginWrapper">
		<?php
			if(isset($_POST['register'])) {
					echo '<script>
							$(document).ready(function() {
								$("#loginForm").hide();
								$("#registrationForm").show();
							});
						</script>';
				}
				else {
					echo '<script>
							$(document).ready(function() {
								$("#loginForm").show();
								$("#registrationForm").hide();
							});
						</script>';

				}
		?>
		<header class=loginHeader>
			<!-- <h1 class="mainHeader">Welcome to chat space!</h1> -->
		</header>

		<main>

			<div class="loginContainer">
			
				<form id="loginForm" action="" method="POST" >
					<h3>Log in</h3>
					<label>Username</label>
					<input type="text" name="username" placeholder="Username" />
					<label>Password</label>
					<input type="password" name="password" placeholder="Password" />
					<input type="submit" name="login" value="Log in" />
					<?php echo $account->getError(Constants::$loginFailed); ?>
					<div class="hasAccountText">
					<span id="hideLogin">Dont have an account with us? <strong>Create one here</strong></span>
				</div>
				</form>
			


				<form id="registrationForm" action="" method="POST">
					<h3>Register</h3>
					<?php echo $account->getError(Constants::$firstNameCharacters); ?>
					<label>First name</label>
					<input type="text" name="firstName" placeholder="First Name" />

					<?php echo $account->getError(Constants::$lastNameCharacters); ?>
					<label>Last name</label>
					<input type="text" name="lastName" placeholder="Last Name" />

					<?php echo $account->getError(Constants::$emailInvalid); ?>
					<?php echo $account->getError(Constants::$emailTaken); ?>
					<label>Email</label>
					<input type="email" name="email" placeholder="Email" />

					<?php echo $account->getError(Constants::$userNameCharacters); ?>
					<?php echo $account->getError(Constants::$usernameTaken); ?>
					<label>Username</label>
					<input type="text" name="username" placeholder="Username" />


					<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
					<?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
					<?php echo $account->getError(Constants::$passwordCharacters); ?>
					<label>Password</label>
					<input type="password" name="password" placeholder="Password" />
					<label>Re-type Password</label>
					<input type="password" name="password2" placeholder="Please re-enter your password" />

					<input type="submit" name="register" value="Register" />
					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>	
				</form>

				

			</div>

		</main>
		<h1 class="mainHeader">Welcome to chat space!</h1>	
	</div>
</body>
</html>