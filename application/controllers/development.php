<?php

class Development extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index() 
    {
        $this->view->title = 'Разарботка теста';
        $this->view->testList = $this->model->testList();
        
        $this->view->render('header');
        $this->view->render('development/index');    
        $this->view->render('footer');
    }

    public function create() 
    {
        
        if (isset($_POST['test'])) {
            $id['userid'] = Session::get('userid');
            $data = array_map('trim', $_POST['test']);
            $data = array_merge($data, $id);
            
            // @TODO: Сделать проверку валидности данных
        
            $this->model->create($data);
        }
        header('location: ' . URL . 'development');
    }
}