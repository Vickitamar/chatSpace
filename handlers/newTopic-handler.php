<?php




if(isset($_POST['do_create'])) {

	function sanitizeForm($inputText) {
	$inputText = strip_tags($inputText); //this strips out all html elements to protect database from attacks.
	$inputText = str_replace("'", "", $inputText); //replaces all apostrophes with no space.
	return $inputText;
	}

	
	
	$category_id = sanitizeForm($_POST['category']);
	$user_id = $_SESSION["userId"];
	$title = sanitizeForm($_POST['title']);
	$body = sanitizeForm($_POST['body']);




	$postTopic = $topic->insertTopic($category_id, $user_id, $title, $body);

	if($postTopic == true) {
		header("Location: frontpage.php");
	}



}






?>