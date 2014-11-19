<?php
//allows access from the database file to this file
    require_once ("../model/database.php");
    //connecting to the database 
    $connection = new mysqi($host, $username, $password);

