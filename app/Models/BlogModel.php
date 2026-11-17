<?php
require_once __DIR__ . '/../../settings/Database.php';
class BlogModel
{
    private $db;
    private $data;

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



    public function registerUser($firstname, $lastname, $password, $email, $website)
    {
        $conn = $this->db->DB_Open();

        $sql = "INSERT INTO users(user_firstname, user_lastname, user_password, user_email, user_website) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $passwordHash);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $website);

        if ($stmt->execute()) {
            $this->db->DB_Close();
            return true;
        } else {
            $this->db->DB_Close();
            return false;
        }
    }
    public function getUserByEmail($email)
    {
        $conn = $this->db->DB_Open();
        if ($conn) {
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function getUserByUsername($email)
    {
        $conn = $this->db->DB_Open();
        if ($conn) {
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }
}
