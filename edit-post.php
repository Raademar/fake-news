<?php
  declare(strict_types=1);
  
  require_once(__DIR__. '/includes/head.php');
  require_once(__DIR__. '/includes/nav.php');

  // Get the requested post id.
  $id = $_GET['id'] ?? null;

  if ( $id == null ) {
      echo("Cannot get the specific post.");
  }
  $int_id = intval($id);

  // Submit the updated post.
  if(isset($_POST["submit"])){
    submitEditPost('updatedPostTitle', 'updatedPostBody', $int_id);
  }

  //Query the database
  $sqlite = $db->prepare("SELECT Articles.id, Articles.Title, Articles.Body, Articles.Likes, Articles.Dt, Users.Full_name 
    FROM Articles INNER JOIN Users ON Users.id = Articles.user_id 
    WHERE Articles.id = $int_id ORDER BY Articles.Dt Desc");
  
  if(!$sqlite){
    die(var_dump($db->errorInfo()));
  }
  $sqlite->execute();
  $res = $sqlite->fetchAll(PDO::FETCH_ASSOC);

  ?>

<?php foreach($res as $row): ?>
  <div class="container">
    <h3>Update Post</h3>
    <form class="col s8" action="edit-post.php?id=<?=$row['id'];?>" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <input id="posttitle" name="updatedPostTitle" type="text" value="<?=$row['Title']?>">
          <label for="posttitle">Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="postbody" name="updatedPostBody" class="materialize-textarea" value="<?=$row['Body']?>"></textarea>
          <label for="postbody">Body</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light green" type="submit" name="submit">Update
          <i class="material-icons right">send</i>
        </button>
      </div>  
    </form>
  </div>
<?php endforeach; ?>
<div class="container">
    <?php foreach($res as $row): ?>
      <h3><?=$row['Title'];?></h3>
      <p><?=$row['Body'];?></p>
      <p><?=$row['Full_name'];?></p>
      <span class="badge" id="like-btn">0 Likes<i class="tiny material-icons like-button">exposure_plus_1</i></span>
      <p><?=$row['Dt'];?></p>
    <?php endforeach; ?>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>