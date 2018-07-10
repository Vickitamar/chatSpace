<?php

if(isset($_POST['login'])) {
	echo "login was pressed";
	//if the login button was pressed
	$username = $_POST['username'];
	$password = $_POST['password'];

	//login function
	$result = $account->login($username, $password);

	if($result == true) {
		$_SESSION["userLoggedIn"] = $username;

		header("Location: frontpage.php");
	}
}
?>