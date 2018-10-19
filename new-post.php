<?php
  declare(strict_types=1);
  
  require_once(__DIR__. '/includes/head.php');
  require_once(__DIR__. '/includes/nav.php');

  if(isset($_POST["submit"])){
    submitNewPost(1, 'posttitle', 'postbody');
  }
  ?>
  <div class="container">
    <form class="col s8" action="new-post.php" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <input id="posttitle" name="posttitle" type="text">
          <label for="posttitle">Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="postbody" name="postbody" class="materialize-textarea"></textarea>
          <label for="postbody">Body</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light green " type="submit" name="submit">Submit
          <i class="material-icons right">send</i>
        </button>
      </div>  
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>