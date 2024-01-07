<?php

class HomeController
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render('header');
        $this->view->render('home');
        $this->view->render('footer');
    }
}