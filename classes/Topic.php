<?php

class Topic {
	private $con;
	private $stmt;
	private $errorArray;

	public function __construct($con) {
	$this->con = $con;
	$this->errorArray = array();
	}


	

	public function getAllTopics() {
		$query = $this->con->query("SELECT topics.*, users.username, categories.name, users.avatar FROM topics
          INNER JOIN users
          ON topics.user_id = users.id
          INNER JOIN categories
          ON topics.category_id = categories.id
          ORDER BY create_date DESC");
		$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
		return $result;
	}




	public function getTopic($id) {
		
		$query = $this->con->query("SELECT topics.*, users.avatar, users.username FROM topics
				INNER JOIN users
				ON topics.user_id = users.id
				WHERE topics.id = $id");
		$result2 = mysqli_fetch_array($query);			
		return $result2;
	}

		public function getReplies($topic_id) {
		
		$query = $this->con->query("SELECT replies.*, users.* FROM replies
				INNER JOIN users
				ON replies.user_id = users.id
				WHERE replies.topic_id = $topic_id
				ORDER BY create_date DESC");
		$result3 = mysqli_fetch_all($query, MYSQLI_ASSOC);		
		return $result3;                         
	}

	public function getCategories() {
		$query = $this->con->query("SELECT * FROM categories");
		$result4 = mysqli_fetch_all($query, MYSQLI_ASSOC);

		return $result4;
	}

	public function getTopicsByUser($username) {
		$query = $this->con->query("SELECT topics.* FROM topics 
				INNER JOIN users
				ON topics.user_id = users.id 
				WHERE username = '$username'");
		$result6 = mysqli_fetch_all($query, MYSQLI_ASSOC);
		return $result6;

	}

	public function insertTopic($category_id, $user_id, $title, $body) {
		$query = $this->con->query("INSERT INTO topics (category_id, user_id, title, body) VALUES ('$category_id', '$user_id', '$title', '$body') ");
		return true;	
	}

	public function insertReply($topicId, $user_id, $body) {
		$query = $this->con->query("INSERT INTO replies (topic_id, user_id, body) VALUES ('$topicId', '$user_id', '$body') ");
		return true;	
	}

	public function getByCategory($category_id) {
		$query = $this->con->query("SELECT topics.*, users.username, categories.name, users.avatar FROM topics
	       	INNER JOIN users
	          ON topics.user_id = users.id
	          INNER JOIN categories
	          ON topics.category_id = categories.id
	          WHERE topics.category_id = $category_id");
		$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
		return $result;
	}

		public function getByUser($user_id) {
		$query = $this->con->query("SELECT topics.*, categories.*, users.username, users.avatar, FROM topics
	       	INNER JOIN users
	          ON topics.user_id = users.id
	          INNER JOIN categories
	          ON topics.category_id = categories.id
	          WHERE topics.user_id = $user_id");
		$result5 = mysqli_fetch_all($query, MYSQLI_ASSOC);
		return $result5;
	}

	public function getTotalReplies($topic_id_replies) {
		$query = $this->con->query("SELECT * FROM replies WHERE topic_id = $topic_id_replies");
		$result = mysqli_query($query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;

	}


	




	



	

	


}	
?>