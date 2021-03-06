<?php
declare(strict_types=1);


require_once(__DIR__. '/includes/head.php');


$request = json_decode(file_get_contents('php://input'));

if(isset($request->id) && isset($request->thisSession)) {
  // Update likes

  $likes = intval($request->thisSession);
  $int_id = intval($request->id);
}

// Submit the data to backend.
submitPostLikes($likes, $int_id);