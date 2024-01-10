<?php
require_once __DIR__ . '/../Models/BlogModel.php';
class BlogController
{
    private $view;
    private $model; // För att interagera med databasen
    private $auth;  // En tjänst för att hantera autentisering

    public function __construct($view)
    {
        $this->view = $view;
        $this->model = new BlogModel();
    }

    public function index($errorMessage = '')
    {
        $blogPosts = $this->model->getBlogPosts();
        $this->view->render('header');
        $this->view->render('blog', ['blogPosts' => $blogPosts, 'errorMessage' => $errorMessage]);
        $this->view->render('footer');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log-in'])) {
            $userEmail = $_POST['user-mail'] ?? '';
            $password = $_POST['user-password'] ?? '';


            $isAuthenticated = $this->authenticateUser($userEmail, $password);


            if ($isAuthenticated) {
                $_SESSION['user'] = $userEmail;
                $errorMessage = 'Welcome! ' . $userEmail . ' is now logged in';
                // Omdirigera användaren till en annan sida eller gör något annat.
            } else {
                // Autentisering misslyckades.
                $errorMessage = 'Invalid username or password.';
            }
        }
        $this->index($errorMessage);
    }

    private function authenticateUser($email, $password)
    {
        // Kontroll av användarnamn och lösenord mot databasen
        // Returnera true om autentiseringen lyckas, annars false.
        return true;
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
