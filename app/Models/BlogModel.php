<?php
require_once __DIR__ . '/../../settings/Database.php';
class BlogModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getBlogPosts()
    {
        return "Hello from BlogModel getBlogPost()";
    }
}


        /* $conn = $this->db->DB_Open();

        $sql = "SELECT *
                FROM articles
                INNER JOIN users
                ON articles.userID = users.userID
                ORDER BY pubdate DESC
                LIMIT 0,5";
        $stmt = $conn->prepare($sql);           // prepare() förbereder för utförandet
        $stmt->execute();                             // utför själva förfrågan mot databasen
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);  // fetchAll() hämtar ut resultatet till en array
        $this->db->DB_Close();
        */