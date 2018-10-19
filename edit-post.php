<?php
  declare(strict_types=1);
  
  require_once(__DIR__. '/includes/head.php');
  require_once(__DIR__. '/includes/nav.php');

  if(isset($_POST["submit"])){
    submitNewPost(1, 'posttitle', 'postbody');
  }

  // Processing form data when form is submitted
  $id = null;
  $posttitle = null;
  $postbody = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if ( null==$id ) {
        header("Location: index.php");
    }

  //Query the database
  $sqlite = $db->prepare('SELECT Articles.id, Articles.Title, Articles.Body, Articles.Likes, Articles.Dt, Users.Full_name FROM Articles INNER JOIN Users ON Users.id = Articles.user_id WHERE Articles.id = $id ORDER BY Articles.Dt Desc');
  if(!$sqlite){
    die(var_dump($db->errorInfo()));
  }
  $sqlite->execute();
  $res = $sqlite->fetchAll(PDO::FETCH_ASSOC);

  $db = NULL;
  ?>

 <div class="container">
  <h3>Update User</h3>
  <form class="col s8" action="edit-post.php?id=<?= $id;?>" method="POST">
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