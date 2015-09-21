<?php

class Groups extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('groups/js/groups.js');
    }
    
    public function index() 
    {    
        $this->view->title = 'Groups';
        $this->view->groupList = new GroupWidget(0,0, $this->model->getGroups());
        $this->loadModel('user', MODELS);
        $this->view->userList = $this->model->userList();
      
        $this->view->render('header');
        $this->view->render('groups/index');
        $this->view->render('footer');
    }
    
    public function add($id) 
    {    
       if (isset($_POST['nameGroup'])) {
            $title = trim($_POST['nameGroup']);
            $subgroup_id = $id;
            var_dump(compact("title", "subgroup_id"));
            // @TODO: Сделать проверку валидности данных
            $this->model->addGroups(compact("title", "subgroup_id"));
        }
        header('location: ' . URL . 'groups');
    }

}