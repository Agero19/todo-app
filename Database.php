<?php

class Database
{
    public $connection;
    public function __construct($config)
    {
        // Connect to the database
        // using PDO , php data objects
        // dsn is a data source name , which simply is a connection string

        $dsn = "mysql:host={$config['host']};
                port={$config['port']};
                dbname={$config['dbname']};
                charset={$config['charset']}";

        // Creating a new PDO connection
        try {
            $this->connection = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            // Handle connection errors
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }
    public function querry($query, $params = null)
    {

        // loading a querry to our connection into a variable and then executing it
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        // fetching data from our db by previous statement in form of Associative array
        return $statement;
    }
}