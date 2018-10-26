<?php
  declare(strict_types=1);
  
  require_once(__DIR__. '/includes/head.php');
  require_once(__DIR__. '/includes/nav.php');

  // Processing form data when form is submitted
  $id = $_GET['id'] ?? null;

  if ( $id == null ) {
      echo("Cannot get the specific post.");
  }
  $int_id = intval($id);

  if(isset($_POST["submit"])){
    submitDeletePost($int_id);
  }
?>

  <div class="container">
    <form class="col s8" action="delete-post.php?id=<?=$int_id;?>" method="POST">
      <div class="row">
      <div class="row">
        <h3>Are you sure you want to delete this post?</h3>
        <button class="btn waves-effect waves-light red" type="submit" name="submit">Delete
          <i class="material-icons right">delete</i>
        </button>
        <a href="index.php" class="btn waves-effect waves-light grey ">Cancel
          <i class="material-icons right">cancel</i>
        </a>
      </div>  
    </form>
  </div>