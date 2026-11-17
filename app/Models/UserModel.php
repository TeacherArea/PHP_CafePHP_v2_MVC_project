<?php
require_once __DIR__ . '/../../settings/Database.php';
class UserModel
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->DB_Open();
    }

    public function registerNewUser($username, $firstname, $lastname, $password, $email, $website)
    {
        $sql = "INSERT INTO users(user_username, user_firstname, user_lastname, user_password, user_email, user_website) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $firstname);
        $stmt->bindParam(3, $lastname);
        $stmt->bindParam(4, $passwordHash);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $website);

        return $stmt->execute();
    }
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE user_username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserData()
    {
        // Visar just nu enbart användarnamnen
        $sql = "SELECT user_username FROM users";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}