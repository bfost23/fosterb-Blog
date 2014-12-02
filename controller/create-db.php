<?php
//allows access from the database file to this file
    require_once (__DIR__ . "/../model/database.php");
    //connecting to the database 
    $connection = new mysqli($host, $username, $password);
    //checking if connection has a connection error
    if($connection->connect_error){
        //kills program and displays error message
        die("<p>Error: " . $connection->connect_error . "</p>");
    }
    //selects the database we need 
    $exists = $connection->select_db($database);
    //checking for a connection to the database
    if(!$exists){
        //creates a database
        $query = $connection->query("CREATE DATABASE $database");
        
        if($query){
            echo "<p>Creation was a Success: " . $database . "</p>"; 
        }
    }
    //if database exists this message will be printed out 
    else {
        echo "Database already exists";
    }
    //creates a table to store the blog posts in the database 
    $query = $connection->query("CREATE TABLE posts ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "title varchar(255) NOT NULL,"
            . "post text NOT NULL,"
            . "PRIMARY KEY (id))"); 
    //checks if the table was created or not 
    if($query){
        echo "<p>successfully created a table: posts</p>";
    }
    else {
        echo"<p>$connection->error</p>";
    }
    $connection->close();
    