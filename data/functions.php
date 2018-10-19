<?php
declare(strict_types=1);
require_once(__DIR__.'/db.php');

  function submitNewPost(int $user_id = 1, string $post_title, string $post_body){

    $stmt = $db->prepare("INSERT INTO 
    Articles (User_id, Title, Body) 
    VALUES 
    (:User_id, :Title, :Body)");
    
    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }

    $stmt->bindParam(':User_id', $user_id);
    $stmt->bindParam(':Title', $postTitle);
    $stmt->bindParam(':Body', $postBody);

    $user_id = $_POST[$user_id];
    $postTitle = $_POST['post-title'];
    $postBody = $_POST['post-body'];
    $stmt->execute();

    echo "New records created successfully";

  }