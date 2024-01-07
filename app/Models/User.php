<?php

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    private function getUserData() {
        // Logik för att hämta data från databasen
        // Använd $this->db för att interagera med databasen
        // Returnerar data eller null om inget finns
    }

    // andra metoder ...
}
