<?php

class User extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index() 
    {    
        $this->view->title = 'Users';
        $this->view->userList = $this->model->userList();
        
        $this->view->render('header');
        $this->view->render('user/index');
        $this->view->render('footer');
    }
    
    public function create() 
    {
        
        if (isset($_POST['registration'])) {
            $data = array_map('trim', $_POST['registration']);
            
            // @TODO: Сделать проверку валидности данных
        
            $this->model->create($data);
        }
      header('location: ' . URL . 'user');
    }
    
    public function edit($id) 
    {
        $this->view->title = 'Edit User';
        $this->view->user = array_shift($this->model->userSingleList($id));
        
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }
    
    public function editSave($id)
    {
        if (isset($_POST['registration'])) {
            $data = array_map('trim', $_POST['registration']);
            $data['userid'] = $id;
            // @TODO: Сделать проверку валидности данных
            $this->model->editSave($data);
        }
        header('location: ' . URL . 'user');   
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'user');
    }
}