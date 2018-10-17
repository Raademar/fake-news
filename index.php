<?php
declare(strict_types=1);

require(__DIR__. '/data/functions.php');
require(__DIR__. '/data/data.php');
require(__DIR__. '/data/db.php');

//Query the database
$sqlite = 'SELECT * FROM Articles ORDER BY Dt Desc';
$result = $db->query($sqlite);

// Query Users database
$sqliteUsers = 'SELECT * FROM Users';
$resultUsers = $db->query($sqliteUsers);


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
    <?php foreach($result as $row): ?>
      <h3><?=$row['Title'];?></h3>
      <p><?=$row['Body'];?></p>
      <p><?=$row['Author'];?></p>
      <span class="badge"><?=$row['Likes'];?><i class="tiny material-icons like-button">thumb_up</i></span>
      <p><?=$row['Dt'];?></p>
    <?php endforeach; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>