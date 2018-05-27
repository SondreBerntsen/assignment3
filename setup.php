<?php


$dsn= 'mysql:dbname=;host=127.0.0.1';

$user = 'root';
$password = '';
$db = new PDO($dsn, $user, $password);

// creating the database
$query = 'CREATE DATABASE IF NOT EXISTS secondhand';
$sth = $db->prepare($query);
$sth->execute();

// inserting the name of the database after we have created it
$dsn= 'mysql:dbname=secondhand;host=127.0.0.1';
$db = new PDO($dsn, $user, $password);

//creating table user
$query = 'CREATE TABLE IF NOT EXISTS user (
        	id INT PRIMARY KEY AUTO_INCREMENT,
          firstName VARCHAR(255) NOT NULL,
          lastName VARCHAR(255) NOT NULL,
          email VARCHAR(255) NOT NULL UNIQUE,
          password VARCHAR(255) NOT NULL,
          type ENUM ("user", "admin"))';
$sth = $db->prepare($query);
$sth->execute();

//creating table category
$query = 'CREATE TABLE IF NOT EXISTS category (
        	name VARCHAR(255) PRIMARY KEY
          )';
$sth = $db->prepare($query);
$sth->execute();

//creating table item
$query = 'CREATE TABLE IF NOT EXISTS item (
          id INT PRIMARY KEY AUTO_INCREMENT,
          name VARCHAR(255) NOT NULL,
          descr text NOT NULL,
          img BLOB,
          date DATETIME,
          owner INT,
          category VARCHAR(255),
          previewtxt VARCHAR(255) NOT NULL,
          FOREIGN KEY (owner) REFERENCES user(id),
          FOREIGN KEY (category) REFERENCES category(name)
          )';
$sth = $db->prepare($query);
$sth->execute();

//creating table messagethread
$query = 'CREATE TABLE IF NOT EXISTS messagethread (
        	id INT PRIMARY KEY AUTO_INCREMENT,
          itemID INT,
          asker INT,
          owner INT,
          FOREIGN KEY (itemID) REFERENCES item(id),
          FOREIGN KEY (asker) REFERENCES user(id),
          FOREIGN KEY (owner) REFERENCES user(id)
          )';
$sth = $db->prepare($query);
$sth->execute();

//creating table message
$query = 'CREATE TABLE IF NOT EXISTS message (
        	id INT PRIMARY KEY AUTO_INCREMENT,
          content text NOT NULL,
          date DATETIME,
          sender INT,
          threadID INT,
          FOREIGN KEY (sender) REFERENCES user(id),
          FOREIGN KEY (threadID) REFERENCES messagethread(id)
          )';
$sth = $db->prepare($query);
$sth->execute();

// example data for user table
$query ="INSERT INTO user (firstName, lastName, email, password, type)
         VALUES ('Sondre', 'Berntsen', 'sondre@ntnu.no', 'sondre', 'admin'),
        ('Ragnhild', 'Alstadsæter', 'ragnhild@ntnu.no', 'ragnhild', 'admin'),
        ('Mads', 'Øigård', 'mads@ntnu.no', 'mads', 'user'),
        ('Elisabeth', 'Medlien', 'elisabeth@ntnu.no', 'elisabeth', 'user')";
$sth = $db->prepare($query);
$sth->execute();

// example data for category table
$query ="INSERT INTO category (name)
         VALUES ('Kjæledyr'),
        ('Underholdning'),
        ('Fiskeutstyr'),
        ('Treningsutstyr'),
        ('Hageutstyr')";
$sth = $db->prepare($query);
$sth->execute();

// example data for item table
$query ="INSERT INTO item (name, descr, owner, category, previewtxt)
         VALUES ('Kattunge gir bort', 'lorem ipsum', 1, 'Kjæledyr', 'Leveringsklar om fire uker'),
        ('Triologi: Ringenes Herre', 'lorem ipsum', 2, 'Underholdning', 'Blue Ray DVDer'),
        ('Fiskestang', 'lorem ipsum', 2, 'Fiskeutstyr', 'Har så mange fra før. Er i god stand.'),
        ('Boksesekk', 'lorem ipsum', 3, 'Treningsutstyr', 'Litt slitt. Jeg er ikke sint nok til å bokse lenger'),
        ('Blomsterpotte', 'lorem ipsum', 4, 'Hageutstyr', 'Veldig fin. Alle blomstene mine dør.')";
$sth = $db->prepare($query);
$sth->execute();

// example data for messagethread table
$query ="INSERT INTO messagethread (asker, owner, itemID)
         VALUES (2, 1, 1),
        (3, 1, 1),
        (4, 1, 1),
        (3, 2, 2),
        (1, 4, 4),
        (4, 2, 3),
        (1, 2, 2)";
$sth = $db->prepare($query);
$sth->execute();

// example data for message table
$query ="INSERT INTO message (sender, content, threadID)
         VALUES (2, 'Kan jeg hente henne rundt 16:00 idag!?!', 1),
        (3, 'Er hun kastrert?', 1),
        (4, 'Når kan hun hentes?', 1),
        (3, 'Er det riper i de?', 2),
        (1, 'Jeg blir veldig sinna av eksamener! Er den tung å bære?', 4),
        (4, 'Er det havstang?', 3),
        (1, 'Henter nå. Hurra!', 2)";
$sth = $db->prepare($query);
$sth->execute();


?>
