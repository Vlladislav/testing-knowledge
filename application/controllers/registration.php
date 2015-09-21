<?php

class Registration extends Controller
{
    public $data = [];
    function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->view->title = 'Регистрация нового пользователя';
        
        $this->view->render('header');
        $this->view->render('registration/index');
        $this->view->render('footer');
    }
    
    public function run()
    { 
         if (isset($_POST['registration'])) {
            $this->data = array_map('trim', $_POST['registration']);
            $result = $this->model->checkNewUser($this->data, Validation::$errors);
            $this->data = $result[1];
            
            if ($result[0]) {
                $this->model->addNewUser($this->data);
                $this->view->title = 'Вы зарегистрированы';
                $this->data = $result[1];
                $this->view->render('header');
                $this->view->render('registration/congratulations');
                $this->view->render('footer');
                return true;
            }
            
            $this->view->data = $this->data;
            $this->view->err = Validation::$errors;
            $this->index();
         }           
    }
}