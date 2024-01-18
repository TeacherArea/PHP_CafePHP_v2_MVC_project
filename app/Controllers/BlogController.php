<?php
require_once __DIR__ . '/../Models/BlogModel.php';
class BlogController
{
    private $view;
    private $model;

    public function __construct($view)
    {
        $this->view = $view;
        $this->model = new BlogModel();
    }

    public function show($message = '')
    {
        $blogPosts = $this->model->getBlogPosts();
        $this->view->render('header');
        $this->view->render('blog', ['blogPosts' => $blogPosts, 'message' => $message]);
        $this->view->render('footer');
    }

    public function registerNewUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $_POST['user-firstname'];
            $lastname = $_POST['user-lastname'];
            $password = $_POST['user-password'];
            $email = $_POST['user-mail'];
            $website = $_POST['user-webb'] ?? null;

            $userUnique = $this->isUserNameUnique($email);

            if ($userUnique) {
                $wasSuccessful = $this->model->registerUser($firstname, $lastname, $password, $email, $website);

                if ($wasSuccessful) {
                    $message = "Registration successful. You can now log in.";
                } else {
                    $message = "Registration failed. Please try again.";
                }

                $this->show($message);
            } else {
                $message = "The username is taken. Please try again.";
                $this->show($message);
                return;
            }
        } else {
            $this->show();
        }
    }

    public function login()
    {
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log-in'])) {
            $userEmail = $_POST['user-mail'] ?? '';
            $password = $_POST['user-password'] ?? '';

            $isAuthenticated = $this->authenticateUser($userEmail, $password);

            if ($isAuthenticated) {
                $_SESSION['user'] = $userEmail;
                $message = 'Welcome! ' . htmlspecialchars($userEmail) . ' is now logged in';
            } else {
                $message = 'Invalid username or password.';
            }
        }
        $this->show($message);
    }

    private function authenticateUser($email, $password)
    {
        $user = $this->model->getUserByEmail($email);

        if ($user && password_verify($password, $user['user_password'])) {
            return true;
        }
        return false;
    }

    private function isUserNameUnique($email)
    {
        $user = $this->model->getUserByEmail($email);
        return !$user;
    }
    

    /*
    public function createArticle()
    {

    }

    public function createComments()
    {
    }

    public function registerNewUser()
    {
    }
*/
}
