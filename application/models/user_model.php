<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select('SELECT user_id, login, role, CONCAT_WS(" ", last_name, first_name, middle_name) as fio FROM users'); //user_id, login, role
    }
     
    public function userSingleList($userid)
    {
        return $this->db->select('SELECT * FROM users WHERE user_id = :userid', array(':userid' => $userid)); //user_id, login, role
    }
    
    public function create($data)
    {
        $this->db->insert('users', array(
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'birthdate' => $data['birthdate'],
            'telephone' => $data['telephone'],
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'email_address' => $data['email_address'],
            'role' => $data['role']
        ));     
    }
    
    public function editSave($data)
    {
        $postData = array(
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'birthdate' => $data['birthdate'],
            'telephone' => $data['telephone'],
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'email_address' => $data['email_address'],
            'role' => $data['role']
        );
        
        $this->db->update('users', $postData, "`user_id` = {$data['userid']}");
    }
    
    public function delete($userid)
    {
        $result = $this->db->select('SELECT role FROM users WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
        return false;
        
        $this->db->delete('users', "user_id = '$userid'");
    }
}