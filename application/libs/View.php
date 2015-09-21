<?php

class View {

    function __construct() {}

    public function render($name, $noInclude = false)
    {
        require ROOT_SITE . 'application/views/' . $name . '.php';    
    }

}