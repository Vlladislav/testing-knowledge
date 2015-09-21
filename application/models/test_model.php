<?php

class Test_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function testList()
    {
        return $this->db->select('SELECT t1.last_name, t7.title, t7.test_id FROM users as t1, users_groups as t2, groups as t3, groups_categories as t4, categories as t5, tests_categories as t6, tests as t7 
        WHERE 
            t1.user_id = t2.user_id AND t2.group_id = t3.group_id AND t3.group_id = t4.group_id AND t4.categorie_id = t5.categorie_id AND t5.categorie_id = t6.categorie_id AND t6.test_id = t7.test_id AND t1.user_id = :userid',
        array('userid' => $_SESSION['userid']));
   }
   
    public function countRecords($testid)
    {
        return $this->db->select('SELECT * 
                                    FROM `questions` 
                                        WHERE test_id = :testid',
        array('testid' => $testid));
   }
    public function countQest($questionid)
    {
        return $this->db->select('SELECT * 
                                    FROM `questions` 
                                        WHERE question_id = :questionid',
        array('questionid' => $questionid));
   }  

  
    public function listAnswers($questionid)
    {
        return $this->db->select('SELECT * 
                                    FROM `answers` 
                                        WHERE question_id = :questionid',
        array('questionid' => $questionid));
   }
         
    public function nameTest($testid)
    {
        return $this->db->select('SELECT title 
                                    FROM `tests` 
                                        WHERE test_id = :testid',
        array('testid' => $testid));
   }
    public function records($testid)
    {
        $result = $this->db->prepare('SELECT question_id 
                                    FROM `questions` 
                                        WHERE test_id = :testid');
        $result->execute(array('testid' => $testid));
        
        return $result->fetchAll(PDO::FETCH_COLUMN, 0);
   }

}