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
         VALUES ('Pets'),
        ('Entertainment'),
        ('Fishing'),
        ('Fitness'),
        ('Gardening')";
$sth = $db->prepare($query);
$sth->execute();

// example data for item table
$query ="INSERT INTO item (name, descr, owner, category, previewtxt)
         VALUES ('Kittens giveaway', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'Pets', 'Ready to be delivered in four weeks'),
        ('A fish', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 3, 'Pets', 'I found a fish. Who wants it?'),
        ('Rabbit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'Pets', 'I am moving to Sweden, and my dog does not want to come with me. Who can give my cat a new home?'),
        ('Triology: Lord of the Rings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 2, 'Entertainment', 'Blue Ray DVDs'),
        ('Lion King', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 3, 'Entertainment', 'VHS'),
        ('Fishing rod', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 2, 'Fishing', 'I have too many. Still in good shape.'),
        ('Punching bag', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 3, 'Fitness', 'A bit worn. I am not mad enough to be boxing bags in my scary basement anymore'),
        ('Flower pot', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 4, 'Gardening', 'Very nice. All my flowers die.')";
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
         VALUES (2, 'Can I pick her up around 4pm today!?!', 1),
        (3, 'Is she castrated?', 1),
        (4, 'When can she be picked up?', 1),
        (3, 'Are they scratched?', 2),
        (1, 'Exams are making me very mad. How heavy is it?', 4),
        (4, 'For ocean or land?', 3),
        (1, 'On my way to pick her up now. Hurray!', 2)";
$sth = $db->prepare($query);
$sth->execute();


?>
