<?php
declare(strict_types=1);

// Submit a new post to the database.
function submitNewPost(int $userId, string $postTitle, string $postBody){
  require(__DIR__.'/db.php');

  try {
    $stmt = $db->prepare("INSERT INTO Articles (id, User_id, Title, Body) 
      VALUES (NULL, :author, :posttitle, :postbody)");

    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }

    $stmt->bindParam(':author', $authorId);
    $stmt->bindParam(':posttitle', $postTitle);
    $stmt->bindParam(':postbody', $postBody);

    $authorId = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_NUMBER_INT);
    $postTitle = filter_input(INPUT_POST, 'posttitle', FILTER_SANITIZE_STRING);
    $postBody = filter_input(INPUT_POST, 'postbody', FILTER_SANITIZE_STRING);

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
    $stmt = $db->prepare("UPDATE Articles 
      SET Title = :updatedPostTitle, Body = :updatedPostBody 
      WHERE id = :id;");

    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }
    // Bind params.
    $stmt->bindParam(':updatedPostTitle', $postTitle);
    $stmt->bindParam(':updatedPostBody', $postBody);
    $stmt->bindParam(':id', $id);

    $postTitle = filter_input(INPUT_POST, 'updatedPostTitle', FILTER_SANITIZE_STRING);
    $postBody = filter_input(INPUT_POST, 'updatedPostBody', FILTER_SANITIZE_STRING);

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
    $stmt = $db->prepare("DELETE FROM Articles 
      WHERE id = :id;");

    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }

    // Bind params.
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

// Save likes on post
function submitPostLikes(int $articleLikes, int $id){
  require(__DIR__.'/db.php');

  try {
    $stmt = $db->prepare("UPDATE Articles 
      SET Likes = Likes + :likes 
      WHERE id = :id;");

    if(!$stmt){
      die(var_dump($db->errorInfo()));
    }
    // Bind params.
    $stmt->bindParam(':likes', $articleLikes);
    $stmt->bindParam(':id', $id);
  
    $stmt->execute();
     
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}