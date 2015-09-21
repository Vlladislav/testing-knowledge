<?php

class Groups_Model extends Model
{
    private $groups_arr = array();
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getGroups()
    {
            
        $query = $this->db->prepare('SELECT group_id, title, subgroup_id FROM groups'); //Готовим запрос
        $query->execute(); //Выполняем запрос
        //Читаем все строчки и записываем в переменную $result
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        //Перелапачиваем массим (делаем из одномерного массива - двумерный, в котором 
        //первый ключ - parent_id)
        $return = array();
        foreach ($result as $value) { //Обходим массив
            $return[$value->subgroup_id][] = $value;
        }
        return $return;
   }
   
   public function addGroups($data)
   {
        $this->db->insert('groups', array(
            'title' => $data['title'],
            'subgroup_id' => $data['subgroup_id']
        )); 
   }
}