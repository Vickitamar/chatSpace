<?php include("includes/header.php"); ?>
<?php if ($_SESSION['userLoggedIn']) :?>
<?php
$category = isset($_GET['category']) ? $_GET['category'] : null;
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

if(isset($category)) {
  $topics = $topic->getByCategory($category);
}



if(!isset($category)) {
  $topics = $topic->getAllTopics();
}
?>


    

    <main>  
      <!-- <?php //echo $_SESSION['userLoggedIn']; ?>
      <?php //echo $_SESSION["userId"]; ?> -->
 

    <?php if($topics) : ?>
      <?php foreach($topics as $topic) : ?>
     
    
    <div class="topics">
      <img src="assets/images/avatars/<?php echo $topic['avatar']; ?>"/>
      <h1><a href="topic.php?id=<?php echo $topic['id']; ?>"><?php echo $topic['title']; ?></a></h1>
      
      <ul>
        <li><?php echo $topic['name']; ?>  >>  </li>
        <li><?php echo $topic['username']; ?>  >>  </li>
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

