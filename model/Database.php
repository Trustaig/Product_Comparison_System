<?php
class Database
{
    private $connection;
    private $username = "root";
    private $host = "localhost";
    private $password = "";
    private $dbName = "products";

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbName);

        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to database: " . mysqli_connect_error(), E_USER_ERROR);
        }
    }

    public function getConnection(): mysqli
    {return $this->connection;}

    /*Prevents duplication of database*/
    private function __clone()
    {}

    public function getQuery($query)
    {return mysqli_query($this->connection, $query);}

}
