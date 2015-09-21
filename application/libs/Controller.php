<?php

class Controller {

    function __construct() {
        $this->view = new View();
    }
    
    public function loadModel($name, $modelPath = MODELS) {
        
        $path = $modelPath . $name.'_model.php';
        
        if (file_exists($path)) {
            require $modelPath .$name.'_model.php';
            
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }        
    }

}