<?php
//allows access from the database file to this file
    require_once (__DIR__ . "/../model/database.php");
    //connecting to the database 
    $connection = new mysqli($host, $username, $password);
    //checking if connection has a connection error
    if($connection->connect_error){
        //kills program and displays error message
        die("Error: " . $connection->connect_error);
    }
    //selects the database we need 
    $exists = $connection->select_db($database);
    //checking for a connection to the database
    if(!$exists){
        //creates a database
        $query = $connection->query("CREATE DATABASE $database");
        
        if($query){
            echo "Creation was a Success: " . $database; 
        }
    }
    //if database exists this message will be printed out 
    else {
        echo "Database already exists";
    }
    $connection->close();
    