<?php

class GroupWidget
{
    public $listGroup = array();
    public $listAction = array();
    private $category_arr = array();
    
    function __construct($parent_id, $level, $category_arr) {
       $this->category_arr = $category_arr;
       $this->render($parent_id, $level);
    }
    
    public function render($parent_id, $level)
    {
        if (isset($this->category_arr[$parent_id])) { //Если категория с таким parent_id существует
            foreach ($this->category_arr[$parent_id] as $value) { //Обходим ее
                /**
                 * Выводим категорию 
                 *  $level * 25 - отступ, $level - хранит текущий уровень вложености (0,1,2..)
                 */
                array_push($this->listGroup, "<li data = '" . $value->group_id . "' style='margin-left:" . ($level * 25) . "px;'>
                                                <a href=".URL. "groups/" . $value->group_id.">" . $value->title . "</a>
                                             </li>");
                array_push($this->listAction, "<li data = '" . $value->group_id . "'>
                                                <span action='add' style='margin-left:50px'> Добавить </span>
                                                <span action='ren'> Перейменовать </span>
                                                <span action='del'> Удалить </span>
                                              </li>");
                $level++; //Увеличиваем уровень вложености
                //Рекурсивно вызываем этот же метод, но с новым $parent_id и $level
                $this->render($value->group_id, $level);
                $level--; //Уменьшаем уровень вложености
            }
        } 
    }
   
}