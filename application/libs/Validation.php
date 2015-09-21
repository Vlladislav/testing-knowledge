<?php

class Validation
{
    public static $errors=[];
    
    public static function addError($attribute, $message, $errors)
    {
        self::$errors[$attribute] = strtr($message, [
            '{attribute}' => $attribute,
        ]);
    }
    
    public static function sanitize(array $data, array $rules, $errors)
    {
        $errors = is_array($errors) ? $errors : [];

        foreach ($rules as $key => $rule) {
            $rule['flags'] = isset($rule['flags'])
                                ? $rule['flags'] | FILTER_NULL_ON_FAILURE
                                : FILTER_NULL_ON_FAILURE;

            $rule['required'] = isset($rule['required'])
                                    ? (bool) $rule['required']
                                    : false;

            $rule['message'] = isset($rule['message']) ? $rule['message'] : '';

            $rules[$key] = $rule;
        }

        $data = filter_var_array($data, $rules);

        foreach ($data as $attribute => $value) {
            $rule = $rules[$attribute];

            if (is_null($value)) {
                self::addError(
                    $attribute,
                    $rule['message'] ?: 'Не корректное значение в поле "{attribute}".',
                    $errors
                );
            }

            if (is_string($value)) {
                if (!$value && $rule['required']) {
                    self::addError(
                        $attribute,
                        $rule['message'] ?: 'Не заполнено обязательное поле "{attribute}".',
                        $errors
                    );
                }
            }
        }
        
        if (array_key_exists('password', $data) and array_key_exists('password_repeat', $data)){
            if ($data['password'] != $data['password_repeat']){
                self::$errors['password_repeat'] = 'Пароли не совпадают "password_repeat".';
            }
        }
            
    return $data;
    }  
}