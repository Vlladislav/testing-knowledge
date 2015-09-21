<?php

class Registration_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function checkNewUser(array $data, $errors)
    {
        $data = Validation::sanitize($data, $this->registrationRules(), $errors);
        var_dump($data);
        // if ($data['password'] != $data['password_repeat']){
            // Validation::$errors['password_repeat'] = 'Пароли не совпадают "password_repeat".';
        // }
        var_dump(Validation::$errors);
        
        if (Validation::$errors) {
            return [false, $data];
        }

        return [true, $data];
    }
    
    public function addNewUser($data)
    {
        $this->db->insert('users', array(
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'birthdate' => $data['birthdate'],
            'telephone' => $data['telephone'],
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'email_address' => $data['email_address']
        ));
    }
    
    public function registrationRules()
    {
        return [
            'last_name' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'first_name' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'middle_name' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'birthdate' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'telephone' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'login' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'password' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'password_repeat' => [
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            'email_address' => [
                'filter' => FILTER_VALIDATE_EMAIL,
                'required' => true,
            ],
        ];
    }
}