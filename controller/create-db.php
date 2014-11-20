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
    else{
        echo"Success: " . $connection->host_info;
    }
    $connection->close();
    