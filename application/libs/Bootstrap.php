<?php

class Bootstrap {

    private $url = null;
    private $controller = null;
    
    private $controllerPath = CONTROLLERS;
    private $modelPath = MODELS;
    private $errorFile = 'error.php';
    private $defaultFile = 'index.php';


    public function init()
    {
        $this->getUrl();

        if (empty($this->url[0])) {
            $this->loadDefaultController();
            return false;
        }

        $this->loadExistingController();
        $this->callControllerMethod();
    }
    
    public function setControllerPath($path)
    {
        $this->controllerPath = trim($path, '/') . '/';
    }
    
    public function setModelPath($path)
    {
        $this->modelPath = trim($path, '/') . '/';
    }
    
    public function setErrorFile($path)
    {
        $this->errorFile = trim($path, '/');
    }
    
    public function setDefaultFile($path)
    {
        $this->defaultFile = trim($path, '/');
    }
    
    private function getUrl()
    {
        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        $url = trim($url, '\/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //var_dump($url);
        $this->url = explode('/', $url);
    }
    
    private function loadDefaultController()
    {
        require $this->controllerPath . $this->defaultFile;
        $this->controller = new Index();
        $this->controller->index();
    }
    
    private function loadExistingController()
    {
        $file = $this->controllerPath . $this->url[0] . '.php';
        
        if (file_exists($file)) {
            require $file;
            $this->controller = new $this->url[0];
            $this->controller->loadModel($this->url[0], $this->modelPath);
        } else {
            $this->error();
            return false;
        }
    }

    private function callControllerMethod()
    {
        $length = count($this->url);
        
        if ($length > 1) {
            if (!method_exists($this->controller, $this->url[1])) {
                $this->error();
            }
        }
        
        switch ($length) {
            case 5:
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3], $this->url[4]);
                break;
            
            case 4:
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3]);
                break;
            
            case 3:
                $this->controller->{$this->url[1]}($this->url[2]);
                break;
            
            case 2:
                $this->controller->{$this->url[1]}();
                break;
            
            default:
                $this->controller->index();
                break;
        }
    }
    
    /**
     * Выводим ошибку, если страница не найдена
     */
    private function error() {
        require $this->controllerPath . $this->errorFile;
        $this->controller = new Error();
        $this->controller->index();
        exit;
    }

}