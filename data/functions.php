<?php
declare(strict_types=1);

// Submit a new post to the database.
function submitNewPost(int $user_id = 1, string $post_title, string $post_body){
  require(__DIR__.'/db.php');

  try {
    $stmt = $db->prepare("INSERT INTO Articles (id, User_id, Title, Body) VALUES (NULL, :User_id, :posttitle, :postbody)");

    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }

    $stmt->bindParam(':User_id', $user_id);
    $stmt->bindParam(':posttitle', $postTitle);
    $stmt->bindParam(':postbody', $postBody);

    //$user_id = $_POST[$user_id];
    $postTitle = $_POST['posttitle'];
    $postBody = nl2br($_POST['postbody']);

    $stmt->execute();
    
    header('location: index.php');
  } catch (PDOException $e) {
    echo $e->getMessage();
    if(!$e) {
      echo "Post submitted successfully!";
    }
  }
}
// Edit a post.
function submitEditPost(string $postTitle, string $postBody, int $id){
  require(__DIR__.'/db.php');

  try {
    $stmt = $db->prepare("UPDATE Articles SET Title = :updatedPostTitle, Body = :updatedPostBody WHERE id = :id;");

    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }

    $stmt->bindParam(':updatedPostTitle', $postTitle);
    $stmt->bindParam(':updatedPostBody', $postBody);
    $stmt->bindParam(':id', $id);

    $postTitle = trim($_POST['updatedPostTitle']);
    $postBody = trim(nl2br($_POST['updatedPostBody']));

    $stmt->execute();
    
    header('location: index.php'); 
  } catch (PDOException $e) {
    echo $e->getMessage();
    if(!$e) {
      echo "Post submitted successfully!";
    }
  }
}
// Delete a post.
function submitDeletePost(int $id){
  require(__DIR__.'/db.php');

  try {
    $stmt = $db->prepare("DELETE FROM Articles WHERE id = :id;");

    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }
    
    $stmt->bindParam(':id', $id);
    $id = $_GET['id'];

    $stmt->execute(array(':id' => $id));

    header('location: index.php');
  } catch (PDOException $e) {
    echo $e->getMessage();
    if(!$e) {
      echo "Post submitted successfully!";
    }
  }
}