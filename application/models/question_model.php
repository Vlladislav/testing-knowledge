<?php

class Question_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function questionList($testid)
    {
        return $this->db->select('SELECT question_id, type, title, description FROM questions 
                                    WHERE 
                                        test_id = :testid',
        array('testid' => $testid));
    }
   
    public function add($data)
    {
        extract($data);      
        $this->db->insert('questions', array(
                        'test_id' => $testid,
                        'type' => $question['type'],
                        'title' => $question['title'],
                        'description' => $question['description'],
        ));           

        $questionId = $this->db->lastInsertId();
        foreach ($variant as $value){
            $is_correct = isset($value['is_correct'])?$value['is_correct']:'false';
            $answer = array(
                            'question_id' => $questionId,
                            'variant' => $value['answer'],
                            'correc' => $is_correct,
            );
            $this->db->insert('answers', $answer);
        var_dump($answer); 
        }    
   }   
   

}