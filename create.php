<?php include("includes/header.php"); ?>
<?php if ($_SESSION['userLoggedIn']) :?> 

<?php $categories = $topic->getCategories(); ?>


<main>
	
	<form role="form" method="post" action="create.php">
        <div class="form-group">
            <label>Topic Title</label>
             <input type="text" casll="form-control" name="title" placeholder="Enter post title">
        </div>
        <div class="form-group">
            <label>Category</label>
                <select class="form-control" name="category">
                <?php foreach($categories as $category) : ?>
                 <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>

             <?php endforeach; ?>
                 </select>
        </div>
        <div class="form-group">
             <label>Topic Body</label>
             <textarea id="body" rows="10" cols="80" class="form-control" name="body"></textarea>
                      
        </div>
        <button type="submit" class="btn btn-default" name="do_create">Submit</button>
    </form>



</main>	

<?php include("includes/footer.php"); ?>
<?php else : ?>
  <div class="notLoggedIn">
    <h1>You are not logged in</h1>
    <a href="index.php"><button>Back To Login Page</button></a>
  </div>
  <?php endif; ?>