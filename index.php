<?php
declare(strict_types=1);

require(__DIR__. '/data/functions.php');
require(__DIR__. '/data/data.php');
require(__DIR__. '/data/db.php');

//Query the database
$sqlite = $db->prepare('SELECT Articles.Title, Articles.Body, Articles.Likes, Articles.Dt, Users.Full_name FROM Articles INNER JOIN Users ON Users.id = Articles.user_id ORDER BY Articles.Dt Desc');
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
      <span class="badge" id="like-btn">34<i class="tiny material-icons like-button">exposure_plus_1</i></span>
      <p><?=$row['Dt'];?></p>
    <?php endforeach; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
    const likeBtn = document.querySelector('#like-btn')

    likeBtn.addEventListener('click', () => {
      let num = parseInt(likeBtn.textContent)
      num ++
      likeBtn.innerHTML = num + '<i class="tiny material-icons like-button">exposure_plus_1</i>'
    })
  </script>
</body>
</html>