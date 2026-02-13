<?php

// DB connection and query
class Database
{
    public $connection;

    // Connect to the MySQL database
    public function __construct()
    {
        try {
            // Declare the Data Source Name (DSN)
            $dsn = 'mysql:host=localhost;dbname=myapp;charset=utf8mb4';

            // Create a new PDO instance connecting to the database
            $this->connection = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    // Fetch data from the database
    public function query($query)
    {
        try {
            // Prepare and execute a SQL query to fetch data
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            // Fetch all results as an associative array
            return $stmt;
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
            exit;
        }
    }
};
