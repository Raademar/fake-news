<?php
declare(strict_types=1);

// Set default timezone
date_default_timezone_set('Europe/Stockholm');

$dsn = 'sqlite:FakeNews.db';
  try {
    
    // Connect to the database
    $db = new PDO($dsn);
    
    //Create Users table if not already existing
    // $db->exec("CREATE TABLE IF NOT EXISTS Users 
    // (id INTEGER NOT NULL CONSTRAINT 
    // user_pk PRIMARY KEY AUTOINCREMENT, 
    // Username VARCHAR(64) NOT NULL, 
    // User_password VARCHAR(256) NOT NULL, 
    // Full_name TEXT NOT NULL, 
    // Dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");

    
    // Insert into Users
  //   $db->exec("INSERT INTO
  //     Users (Username, User_password, Full_name)
  //     VALUES
  //     ('Matthew', 'SECRET_PASSWORD', 'Matthew Rangston')");
  }

  catch(PDOException $e){
    print 'Exception : '.$e->getMessage();
  }