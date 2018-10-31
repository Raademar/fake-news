<?php
  declare(strict_types=1);
  
  require_once(__DIR__. '/includes/head.php');
  require_once(__DIR__. '/includes/nav.php');

  // Get the id from the request
  $id = $_GET['id'] ?? null;

  if ( $id == null ) {
      echo("Cannot get the specific post.");
  }
  $int_id = intval($id);
  // Submit the delete on chosen post.
  if(isset($_POST["submit"])){
    submitDeletePost($int_id);
  }
?>
  <!-- Display confirmation on delete request. Can be improved to be displayed inside index.php -->
  <div class="container">
    <form class="col s8" action="delete-post.php?id=<?=$int_id;?>" method="POST">
      <div class="row">
      <div class="row">
        <h3>Are you sure you want to delete this post?</h3>
        <button class="btn waves-effect waves-light red darken-3" type="submit" name="submit">Delete
          <i class="material-icons right">delete</i>
        </button>
        <a href="index.php" class="btn waves-effect waves-light grey darken-2">Cancel
          <i class="material-icons right">cancel</i>
        </a>
      </div>  
    </form>
  </div>