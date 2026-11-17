<?php
require_once __DIR__ . '/../../settings/Database.php';
class BlogModel
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->DB_Open();
    }

    public function getBlogPostsAndUsers()
    {
        $sql = "SELECT articles.*, users.user_username
                FROM articles INNER JOIN users
                ON articles.user_id = users.user_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
