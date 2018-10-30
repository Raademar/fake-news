<?php
declare(strict_types=1);


require_once(__DIR__. '/includes/head.php');

if (isset($_POST['likes'])) {
  // Processing form data when form is submitted
  $id = $_POST['id'] ?? null;
  
  if ( $id == null ) {
      echo("Something went wrong with the POST request when sending likes.");
  }
  // Display what we get from post.
  $int_id = intval($id);
  $likes = intval($_POST['likes']);
  echo $likes . "<br>";
  echo $int_id . "<br>";

  // Submit the data to backend.
  submitPostLikes($likes, $int_id);
}