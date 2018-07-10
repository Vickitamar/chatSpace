<?php include("includes/header.php"); ?>
<?php if ($_SESSION['userLoggedIn']) :?> 

<?php

$topic_id = $_GET['id'];

$topics = $topic->getTopic($topic_id);
$replies = $topic->getReplies($topic_id);



$_SESSION["topicId"] = $topic_id;
		


?>
<main>
	<div class="topics">
		<img src="assets/images/avatars/<?php echo $topics['avatar']; ?>"/>
		<div class="topicHeaderList">
		<h1><?php echo $topics['title']; ?></h1>
		<ul>
			
        	
        	<li><?php echo formatDate($topics['create_date']); ?></li><br>
        	<li><?php echo $topics['username']; ?></li>	
		</ul>
		</div>
		<p><?php echo $topics['body']; ?></p>
		
	</div>

	<?php foreach($replies as $reply) : ?>
	<div class="replies">
		<div class="replyImageList">
			<img src="assets/images/avatars/<?php echo $reply['avatar']; ?>"/>

			
			<ul>
	        	<li><?php echo $reply['username']; ?></li><br>
	        	<li><?php echo formatDate($reply['create_date']); ?></li>	
	        		
			</ul>
		</div>
		<p><?php echo $reply['body']; ?></p>
		
	</div>
	<?php endforeach; ?>

	<div class="replyToTopic">
		<h3>Reply To Topic</h3>
		
		 <form  id="replyForm" method="post" action="topic.php" role="form">        
            <div class="form-group">
            <textarea id="reply" rows="10" cols="80" class="form-control" name="reply"></textarea>

            </div>
           <button type="submit" name="submit-reply" class="btn btn-default">Submit</button>
        </form>
	</div>	
</main>	



	


<?php include("includes/footer.php"); ?>

<?php else : ?>
  <div class="notLoggedIn">
    <h1>You are not logged in</h1>
    <a href="index.php"><button>Back To Login Page</button></a>
  </div>
  <?php endif; ?>