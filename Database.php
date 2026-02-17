<?php

// DB connection and query
class Database
{
    public $connection;
    public $statement;

    // Connect to the MySQL database
    public function __construct($config, $username = 'root', $password = '')
    {

        // Declare the Data Source Name (DSN)
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {

            // Create a new PDO instance connecting to the database
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    // Fetch data from the database
    public function query($query, $params)
    {
        try {
            // Prepare and execute a SQL query to fetch data
            $this->statement = $this->connection->prepare($query);

            $this->statement->execute($params);

            // Fetch all results as an associative array
            return $this;
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
            exit;
        }
    }

    // Fetch single row
    public function find()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch all rows
    public function getAll()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOrFail()
    {
        $result = $this->find();
        if (! $result) {
            abort();
        }
        return $result;
    }
};
