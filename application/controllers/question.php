<?php

class Question extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index($id)
    {
        var_dump($id);
        $this->view->title = 'Список вопроов';
        
        $this->view->render('header');
        $this->view->render('question/index');    
        $this->view->render('footer');
    }
    
    public function view($id)
    {
        var_dump($id);
        $this->view->title = 'Список вопроов';
        $this->view->questionList = $this->model->questionList($id);
        
        $this->view->render('header');
        $this->view->render('question/index');    
        $this->view->render('footer');
    }
    
    public function add($id)
    {
            $this->view->id = $id;
        if (isset($_POST['question'])) {          
            $question = array_map('trim', $_POST['question']);
            $variant = $_POST['variants'];//array_map('trim', $_POST['variants']);
            $testid = $id;
            $key = ['testid', 'question', 'variant'];
            $data = compact($key, $testid, $question, $variant);

            // @TODO: Сделать проверку валидности данных
        
            $this->model->add($data);
            header('location: ' . URL . 'development');
        }     
        
        $this->view->title = 'Добавить вопрос';
        
        $this->view->render('header');
        $this->view->render('question/add');    
        $this->view->render('footer');
    }
}