<?php
require_once __DIR__ . '/../../settings/Database.php';
class BlogModel
{
    private $db;
    private $data;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getBlogPostsAndUsers()
    {
        $data = [
            'loggedInUsers' => $loggedInUsers, // En array av inloggade användare
            'blogPosts' => $blogPosts         // En array av blogginlägg
        ];
       
    }

    public function registerUser($firstname, $lastname, $password, $email, $website = null)
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
