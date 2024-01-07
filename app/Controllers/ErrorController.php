<?php

class ErrorController
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index()
    {
        http_response_code(404);
        $this->view->render('header');
        $this->view->render('error');
        $this->view->render('footer');
    }
}
