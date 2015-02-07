<?php

require_once(__DIR__ . "/Database.php");
session_start();
//fix path to the files
$path = "/fosterb-blog/";

// sets the variables to use for the database
$host = "localhost";
$username = "root";
$password = "root";
$database = "blog_db";

if (!isset($_SESSION["connection"])) {
    $connection = new Database($host, $username, $password, $database);
    $_SESSION["connection"] = $connection;
}