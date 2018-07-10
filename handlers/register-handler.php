<?php

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText); //this strips out all html elements to protect database from attacks.
	$inputText = str_replace(" ", "", $inputText); //replaces all spaces with no space.
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText); 
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));//first character uppercase, the rest lowercase. 
	return $inputText;
}

if(isset($_POST['register'])) {
	//register button was pressed
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = sanitizeFormString($_POST['email']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstName, $lastName, $email, $password, $password2);

	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: topics.php");
	}

}	




?>