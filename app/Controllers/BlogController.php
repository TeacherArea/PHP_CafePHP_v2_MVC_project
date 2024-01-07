<?php

class BlogController
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render('header');
        $this->view->render('blog');
        $this->view->render('footer');
    }
}