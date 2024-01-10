<?php

class Database
{
    private $conn = null;

    public function DB_Open()
    {
        include 'db_credentials.php';

        if ($this->conn == null) {
            try {
                $this->conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("set names utf8");
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
        }
        return $this->conn;
    }

    public function DB_Close()
    {
        $this->conn = null;
    }
}