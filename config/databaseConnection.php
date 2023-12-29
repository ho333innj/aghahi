<?php 
class databaseConnection
{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST  ,DB_USER ,DB_PASSWORD ,DB_DATABASE);
        if($conn ->connect_error)
        {
            die('<h1>database connection failed</h1>');
        }
        echo 'database connection successfully';
        return $this->conn = $conn;
    }
}