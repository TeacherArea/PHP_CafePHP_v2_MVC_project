<?php
require_once __DIR__ . '/../../settings/Database.php';
class User {
    private $db;

    public function __construct() {
        $database = new Database();
    }

    private function getUserData() {
        $conn = $this->db->DB_Open();
        // Logik för att hämta data från databasen

    }
}