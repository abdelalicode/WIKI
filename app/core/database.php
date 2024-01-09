<?php

class Db
{
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=wiki", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }

    

}

