<?php

class Error extends Controller {

    function __construct() {
        parent::__construct(); 
    }
    
    public function index() {
        $this->view->title = '404 Ошибка';
        $this->view->msg = '<h1>404 Ошибка</h1><h2>Этой страницы не существует</h2>';

        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}