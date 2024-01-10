<?php

class ShopController
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index($userData = null, $productsData = null)
    {
        $this->view->render('header');
        $this->view->render('shop');
        $this->view->render('footer');
    }
}