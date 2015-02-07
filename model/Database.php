<?php

class Database {

    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    public $error;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        //connecting to the database 
        $this->connection = new mysqli($host, $username, $password);
        //checking if connection has a connection error
        if ($this->connection->connect_error) {
            //kills program and displays error message
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
        //selects the database we need 
        $exists = $this->connection->select_db($database);
        //checking for a connection to the database
        if (!$exists) {
            //creates a database
            $query = $this->connection->query("CREATE DATABASE $database");

            if ($query) {
                echo "<p>Creation was a Success: " . $database . "</p>";
            }
        }
        //if database exists this message will be printed out 
        else {
            echo "Database already exists";
        }
    }

    public function openConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        //checking if connection has a connection error
        if ($this->connection->connect_error) {
            //kills program and displays error message
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
    }

    public function closeConnection() {
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }

    public function query($string) {
        $this->openConnection();

        $query = $this->connection->query($string);

        if(!$query){
            $this->error = $this->connection->error;
        }
        
        $this->closeConnection();

        return $query;
    }

}
