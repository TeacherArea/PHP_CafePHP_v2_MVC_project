<?php

class Database
{
    private $conn = null;

    public function getConnection()
    {
        include 'db_credentials.php';

        if ($this->conn == null) {
            try {
                $this->conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("set names utf8");
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
        }
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}
