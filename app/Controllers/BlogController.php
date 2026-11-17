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

    public function showBlog($message = '')
    {
        $blogPosts = $this->model->getBlogPostsAndUsers();

        $data = [
            'blogPosts' => $blogPosts,
            'message' => $message,
            'isLoggedIn' => !empty($_SESSION['user']) ];

        $this->view->render('header');
        $this->view->render('blog', $data);
        $this->view->render('footer');
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
