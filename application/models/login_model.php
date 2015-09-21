<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT user_id, role, login FROM users WHERE 
                                    login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        
        $data = $sth->fetch();
        var_dump($data);
        $count =  $sth->rowCount();
        
        if ($count > 0) {
            Session::init();
            Session::set('login', $data['login']);
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['user_id']);
    
        } else {
            header('location: ../login');
        }
    }
}