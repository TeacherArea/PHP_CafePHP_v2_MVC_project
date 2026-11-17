<?php
require_once __DIR__ . '/../Models/UserModel.php';
class UserController
{
    private $view;
    private $model;

    public function __construct($view)
    {
        $this->view = $view;
        $this->model = new UserModel();
    }

    public function registerNewUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $username = $_POST['user-username'];
            $firstname = $_POST['user-firstname'];
            $lastname = $_POST['user-lastname'];
            $password = $_POST['user-password'];
            $email = $_POST['user-mail'];
            $website = $_POST['user-webb'] ?? null;

            $userUnique = $this->isUserNameUnique($email);

            if ($userUnique) {
                $wasSuccessful = $this->model->registerNewUser($username, $firstname, $lastname, $password, $email, $website);

                if ($wasSuccessful) {
                    $registrationmessage = "Registration successful. You can now log in.";
                } else {
                    $registrationMessage = "Registration failed. Please try again.";
                }
                $this->showUser($registrationMessage);
            } else {
                $registrationmessage = "That username is taken, or is unvalid. Please try again.";
                $this->showUser($registrationMessage);
                return;
            }
        } else {
            $this->showUser();
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
                $loginMessage = 'Welcome! ' . htmlspecialchars($userEmail) . ' is now logged in';
            } else {
                $loginMessage = 'Invalid username or password.';
            }
        }
        $this->showUser($loginMessage);
    }

    private function authenticateUser($email, $password)
    {
        $user = $this->model->getUserByEmail($email);

        if ($user && password_verify($password, $user['user_password'])) {
            return true;
        }
        return false;
    }

    private function isUserNameUnique($username)
    {
        $user = $this->model->getUserByUsername($username);
        return !$user;
    }

        private function isUserEmailUnique($email)
    {
        $user = $this->model->getUserByEmail($email);
        return !$user;
    }


public function showUser($registrationMessage = '', $loginMessage = '')
{
    $data = [
        'registrationMessage' => $registrationMessage,
        'loginMessage' => $loginMessage,
        'isLoggedIn' => !empty($_SESSION['user'])
    ];

    $this->view->render('header');
    $this->view->render('blog', $data);
    $this->view->render('footer');
}
}
