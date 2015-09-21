<?php

class Development_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function testList()
    {
        return $this->db->select('SELECT t1.test_id, t1.title, CONCAT_WS(" ", t2.last_name, t2.first_name, t2.middle_name) as fio FROM tests as t1, users as t2 WHERE t1.user_id = t2.user_id');
    }
    
    public function create($data)
    {
        var_dump($data);
          $this->db->insert('tests', array(
             'title' => $data['title'],
             'user_id' => $data['userid']
         ));     
    }

}