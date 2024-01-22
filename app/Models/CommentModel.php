<?php
require_once __DIR__ . '/../../settings/Database.php';
class Comment
{
    private $db;
    public function getData()
    {
        $conn = $this->db->DB_Open();
        // Logik för att hämta data från en databas
    }
}
