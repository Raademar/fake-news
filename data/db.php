<?php
declare(strict_types=1);

// Set default timezone
date_default_timezone_set('Europe/Stockholm');

$dsn = 'sqlite:FakeNews.db';
  try {
    
    // Connect to the database
    $db = new PDO($dsn);
    
    // Create Users table
    // $db->exec("CREATE TABLE IF NOT EXISTS Users (id INTEGER NOT NULL CONSTRAINT user_pk PRIMARY KEY AUTOINCREMENT, Username VARCHAR(64) NOT NULL, User_password VARCHAR(256) NOT NULL, Full_name TEXT NOT NULL, Dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");

    // // Create Artciles table
    // $db->exec("CREATE TABLE IF NOT EXISTS Articles (id INTEGER NOT NULL CONSTRAINT posts_pk PRIMARY KEY, User_id INTEGER NOT NULL, Title TEXT NOT NULL, Body TEXT NOT NULL, Dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, Likes INTEGER, FOREIGN KEY (User_id) REFERENCES Users (id)");

    
    // Insert into Users
    // $db->exec("INSERT INTO
    //   Users (Username, User_password, Full_name)
    //   VALUES
    //   ('Matthew', 'SECRET_PASSWORD', 'Matthew Rangston')");
    
    //   $db->exec("INSERT INTO
    //   Users (Username, User_password, Full_name)
    //   VALUES
    //   ('Charlie', 'SECRET_PASSWORD2', 'Charlie Insbrook')");

   // Basic insert
  //   $db->exec("INSERT INTO 
  //     Articles (User_id, Title, Body, Likes) 
  //     VALUES 
  //     ('1', 'Is your Alexa device spying on your for Big Corps?', 'I know that Papyrus font is considered old-fashioned, but I have to say, we find the font easy on the eye and ultimately easy to read. It`s all about professionalism. Can you use a clear background on my website? No, not white. Transparent. I don`t like circles. Why doesn`t this work in IE6? We think it would be better to stick with darker bright colors. I know that Papyrus font is considered old-fashioned, but I have to say, we find the font easy on the eye and ultimately easy to read. It`s all about professionalism. The design needs to be less liney. There are too many lines. Can we do the website in black and white to save some money? Instead of the boring image of a hand when a client clicks on something, please make it a small (but friendly)  garden insect - e.g. a butterfly, grasshopper, or hummingbird. Please avoid insects with negative connotations, e.g. a slug, caterpillar, or hawk.', '34')");
    
  //   $db->exec("INSERT INTO
  //     Articles (User_id, Title, Body, Likes)
  //     VALUES
  //     ('1', 'Google bought YouTube and now it crashes??', 'Youtube does it, why can`t you build it just like them? It`s too blocky. How do I click that? I`m not sure about the colour that you`ve used for the background, I guess it looks OK on screen but when I print it on our office printer it kinda reminds me of a pair of corduroys I had as a child. Can we have the header change color every hour? That way the site looks fresh when people come back to it.', '99')");
  }

  catch(PDOException $e){
    print 'Exception : '.$e->getMessage();
  }