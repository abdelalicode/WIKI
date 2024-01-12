<?php

class Db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $conn;

    public function connect()
    {
        try {
            if (!$this->conn) {
                $this->conn = new PDO("mysql:host=$this->servername;dbname=wiki", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            // Handle the error (log it, print it, etc.)
        }

        return $this->conn;
    }
}