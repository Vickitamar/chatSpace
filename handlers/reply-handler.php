<?php



function getTotalReplies($topic_id_replies) {

	$db_host = 'localhost';
	$db_name = 'chatSpace';
	$db_user = 'root';
	$db_pass = '';

	//create mysqli object
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	$query = "SELECT * FROM replies WHERE topic_id = $topic_id_replies";
	$result = mysqli_query($con, $query);
	$rowcount = mysqli_num_rows($result);
	
			
	return $rowcount;

}





if(isset($_POST['submit-reply'])) {

	$topicId = $_SESSION["topicId"];
	$user_id = $_SESSION["userId"];
	$body = $_POST['reply'];
	$error = array();

	

	if (empty($_POST['reply'])) {
				array_push($error, Constants::$noReply);
				var_dump($error);
				return "<span class='errorMessage'>$error</span>"; 


	} else {
		$postReply = $topic->insertReply($topicId, $user_id, $body);
	}


	 if($postReply) {
	 	header("Location: topic.php?id=$topicId");
	}

}






?>