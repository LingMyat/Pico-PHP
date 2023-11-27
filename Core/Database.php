<?php

namespace Core;

use PDO;

class Database 
{
    public $connection;
    public $statement;

    public function __construct($config, $username = "root", $password = '')
    {

        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query) 
    {
        
        $this->statement = $this->connection->query($query);

        return $this;

    }

    public function get() 
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if ($result) return $result;

        abort(404);
    }
}