<?php

class Test extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index()
    {
        $this->view->title = 'Test';
        $this->view->testList = $this->model->testList();
        
        $this->view->render('header');
        $this->view->render('test/index');    
        $this->view->render('footer');
    }
    
    public function go($id)
    {
        $this->view->title = 'test';
        $this->view->name = $this->model->nameTest($id);
        $this->view->testList = $this->model->testList();
        $this->view->model = $this->model;
        $this->view->countRecords = $this->model->countRecords($id);
        $this->view->records = $this->model->records($id);
        
        $this->view->render('header');
        $this->view->render('test/go');    
        $this->view->render('footer');
    }
    public function proba()
    {
        $ttt = $this->model->countQest($_GET['id']);
        $rrr = $this->model->listAnswers($_GET['id']);
        $bbb = array_merge($ttt, $rrr);
     
       echo json_encode($bbb);
    }
    
    public function logout()
    {
        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
    }
    
}