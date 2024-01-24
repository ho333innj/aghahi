<?php 
class databaseConnection
{
    public $conn; // Declare the property with the public keyword

    public function __construct()
    {
        $conn = new mysqli(DB_HOST  ,DB_USER ,DB_PASSWORD ,DB_DATABASE);
        if($conn ->connect_error)
        {
            die('<h1>database connection failed</h1>');
        }
        $this->conn = $conn;
    }
}