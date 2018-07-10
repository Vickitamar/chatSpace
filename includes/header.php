<?php 
require('core/init.php');

$username = $_SESSION['userLoggedIn'];



$topics = $topic->getAllTopics();
$categories = $topic->getCategories();
$users = $topic->getTopicsByUser($username);




?>

<!DOCTYPE html>
<html>
<head>
  <title>Topics</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <header>

    </header>

    <nav>
      <div class="navigation">
      <ul>
          <li class="first"><a href="frontpage.php">Topics</a></li>
          <li>Menu item two</li>
          <li>Menu item three</li>
          <li><a href="create.php">Start a topic</a></li>
        </ul>
      </div>
    </nav>

    <?php if ($_SESSION['userLoggedIn']) :?> 

    <aside>
      <div class="welcome">
        <h2>Welcome <?php echo $_SESSION['userLoggedIn']; ?></h2>

        <button><a href="logout.php">Logout</a></button>
      </div>  
      <div class="categories">
        <h4 class="hCategory">Categories</h4>
          <ul>
            <?php foreach($categories as $category) : ?> 
            <a href="topics.php?category=<?php echo $category['id']; ?>"><li><?php echo $category['name']; ?></li></a>
          <?php endforeach; ?>
          </ul>
      </div>

      <div class="myThreads">
        <h4 class="hCategory">My Threads</h4>
        <ul>
          <?php foreach($users as $user) : ?> 
          <a href="topic.php?id=<?php echo $user['id']; ?>"><li><?php echo $user['title']; ?></li></a>
        <?php endforeach; ?>
          
        </ul>
      </div>  
    </aside>
    <?php else : ?>
      <div class="asideNotLoggedIn">
      </div>  


    <?php endif; ?>  

