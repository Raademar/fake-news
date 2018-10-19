<?php
  declare(strict_types=1);
  
  require_once(__DIR__. '/includes/head.php');
  require_once(__DIR__. '/includes/nav.php');

  submitNewPost(1, 'post-title', 'post-body');

  ?>
  <div class="container">
    <form class="col s8" action="new-post.php" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <input id="post-title" name="post-title" type="text">
          <label for="post-title">Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="post-body" name="post-body" class="materialize-textarea"></textarea>
          <label for="post-body">Body</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light green " type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>
      </div>  
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>