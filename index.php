<?php
declare(strict_types=1);

require(__DIR__. '/data/functions.php');
require(__DIR__. '/data/data.php');
require(__DIR__. '/data/db.php');

//Query the database
$sqlite = $db->prepare('SELECT Articles.Title, Articles.Body, Articles.Likes, Articles.Dt, Users.Full_name FROM Articles INNER JOIN Users ON Users.id = Articles.user_id ORDER BY Dt Desc');
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="assets/main.css">
  <title>Fake News</title>
</head>
<body>
  <nav>
    <div class="nav-wrapper blue darken-1 ml-4">
      <a href="#" class="brand-logo">Freaky Friday News</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </div>
  </nav>
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
      <span class="badge"><?=$row['Likes'];?><i class="tiny material-icons like-button">thumb_up</i></span>
      <p><?=$row['Dt'];?></p>
    <?php endforeach; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>