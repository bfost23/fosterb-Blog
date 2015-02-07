<?php
//allows access from the database file to this file
    require_once (__DIR__ . "/../model/config.php");
    
    //creates a table to store the blog posts in the database 
    $query = $_SESSION["connection"]->query("CREATE TABLE posts ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "title varchar(255) NOT NULL,"
            . "post text NOT NULL,"
            . "PRIMARY KEY (id))"); 
    //checks if the table was created or not 
    if($query){
        echo "<p>successfully created a table: posts</p>";
    }
    else {
        echo"<p>" . $_SESSION["connection"]->error . "</p>";
    }
    