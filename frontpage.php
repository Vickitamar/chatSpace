<?php require('includes/header.php'); ?>
<?php
if ($_SESSION['userLoggedIn']) :?> 






    <main>

  

 

    <?php if($topics) : ?>
      <?php foreach($topics as $topic) : ?>


     
    
    <div class="topics">
      <img src="assets/images/avatars/<?php echo $topic['avatar']; ?>"/>
      <div class="headerReply">
        <h1><a href="topic.php?id=<?php echo $topic['id']; ?>"><?php echo $topic['title']; ?></a></h1>
        <span id="replyCount"><?php echo getTotalReplies($topic['id']); ?></span>
    </div>
      

     
      <ul>
        <li><a href="topics.php?category=<?php echo $topic['category_id']; ?>"><?php echo $topic['name']; ?></a> ></li>
        <li><a href=""><?php echo $topic['username']; ?></a> ></li>
        <li><?php echo formatDate($topic['create_date']); ?></li>
        
      </ul>

    </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>No topics</p>  
    <?php endif; ?>
    </main>

<?php include("includes/footer.php"); ?>
<?php else : ?>
  <div class="notLoggedIn">
    <h1>You are not logged in</h1>
    <a href="index.php"><button>Back To Login Page</button></a>
  </div>
  <?php endif; ?>



