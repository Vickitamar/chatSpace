<?php

class Account {
	private $con;
	private $errorArray;

	public function __construct($con) {
		$this->con = $con;
		$this->errorArray = array();
	}

	public function login($un, $pw) {
		$pw = md5($pw);
		
		$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
		$row = mysqli_fetch_array($query);
		if(mysqli_num_rows($query) == 1) {
			
			$_SESSION["userId"] = $row['id'];
			return true;
		} else {
			array_push($this->errorArray, Constants::$loginFailed);
			return false;
		}
	}




	public function getError($error) { //if there is no error message return an empty string.
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			
			return "<span class='errorMessage'>$error</span>";
		}

	public function register($un, $fn, $ln, $em, $pw, $pw2) {
		$this->validateUsername($un);
		$this->validateFirstname($fn);
		$this->validateLastname($ln);
		$this->validateEmails($em);
		$this->validatePasswords($pw, $pw2);

		if(empty($this->errorArray)) {
			//insert into database
			return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
		} else {
			return false;
		}
	}




	private function insertUserDetails($un, $fn, $ln, $em, $pw) {
		$encryptedPw = md5($pw);
		$date = date("Y-m-d");

		$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date')");
		return $result;
	}

	private function validateUsername($un) {
			if(strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, Constants::$userNameCharacters);
				return; //this finishes the function once the error has been detected.
			}

			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
			if(mysqli_num_rows($checkUsernameQuery) != 0) {
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}
		}

		private function validateFirstname($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return; //this finishes the function once the error has been detected.
			}
		}

		private function validateLastname($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return; //this finishes the function once the error has been detected.
			}
		}

		private function validateEmails($em) {

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) { //checks if email is in the correct format.
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}
		}

		private function validatePasswords($pw, $pw2) {
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;	
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
				return;	
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}
		}


	
}

?>