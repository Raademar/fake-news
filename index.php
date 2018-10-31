<?php
declare(strict_types=1);

// include separated content
require_once(__DIR__. '/includes/head.php');
require_once(__DIR__. '/includes/nav.php');

// Query the database
$sqlite = $db->prepare('SELECT Articles.id, Articles.Title, Articles.Body, Articles.Likes, Articles.Dt, Users.Full_name FROM Articles INNER JOIN Users ON Users.id = Articles.user_id ORDER BY Articles.Dt Desc');
if(!$sqlite){
  die(var_dump($db->errorInfo()));
}
$sqlite->execute();
$res = $sqlite->fetchAll(PDO::FETCH_ASSOC);


// Close the connection
$db = NULL;

?>

<!-- Setup our HTML -->
<div class="container">
  <form>
    <div class="input-field no-focus">
      <input id="search" type="search" placeholder="Search..">
      <i class="material-icons">close</i>
    </div>
  </form>
</div>

<div class="container">
<!-- Display content from DB. -->
  <?php foreach($res as $row): ?>
  <div class="post">
    <h3 class="title target"><?=$row['Title'];?></h3>
    <p class="body target"><?=$row['Body'];?></p>
    <p class="full-name"><?=$row['Full_name'];?></p>
    <span class="badge like-btn nav-text" data-id="<?=$row['id'];?>"><?=$row['Likes']?> Likes<i class="tiny material-icons like-button pink-text text-darken-2">favorite</i></span>
    <p class="date"><?=$row['Dt'];?></p>
    <a href="edit-post.php?id=<?= $row['id']?>" class="blue-text text-darken-3"><i class="tiny material-icons ">edit</i> Edit post</a>
    <a href="delete-post.php?id=<?= $row['id']?>" class="red-text text-darken-3"><i class="tiny material-icons">delete</i>Delete post</a> 
  </div>
  <?php endforeach; ?>
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large green darken-3" href="new-post.php">
      <i class="large material-icons">add</i>
    </a>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="assets/main.js"></script>
</body>
</html>