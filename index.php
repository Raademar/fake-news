<?php
declare(strict_types=1);

require_once(__DIR__. '/includes/head.php');
require_once(__DIR__. '/includes/nav.php');

//Query the database
$sqlite = $db->prepare('SELECT Articles.id, Articles.Title, Articles.Body, Articles.Likes, Articles.Dt, Users.Full_name FROM Articles INNER JOIN Users ON Users.id = Articles.user_id ORDER BY Articles.Dt Desc');
if(!$sqlite){
  die(var_dump($db->errorInfo()));
}
$sqlite->execute();
$res = $sqlite->fetchAll(PDO::FETCH_ASSOC);

// Query Users database
$sqliteUsers = $db->prepare('SELECT * FROM Users');
$sqliteUsers->execute();
$resUsers = $sqliteUsers->fetchAll(PDO::FETCH_ASSOC);


// Close the connection
$db = NULL;

require_once(__DIR__. '/includes/head.php');
require_once(__DIR__. '/includes/nav.php');

?>
  <div class="container">
    <form>
      <div class="input-field">
        <input id="search" type="search" required>
        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
        <i class="material-icons">close</i>
      </div>
    </form>
  </div>
  <div class="container">
    <?php foreach($res as $row): ?>
      <h3><?=$row['Title'];?></h3>
      <p><?=$row['Body'];?></p>
      <p><?=$row['Full_name'];?></p>
      <span class="badge like-btn" data-id="<?=$row['id'];?>"><?=$row['Likes']?> Likes<i class="tiny material-icons like-button pink-text text-darken-1">favorite</i></span>
      <p><?=$row['Dt'];?></p>
      <a href="edit-post.php?id=<?= $row['id']?>"><i class="tiny material-icons">edit</i> Edit post</a>
      <a href="delete-post.php?id=<?= $row['id']?>" class="red-text"><i class="tiny material-icons">delete</i>Delete post</a> 
    <?php endforeach; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script src="assets/main.js"></script>
</body>
</html>