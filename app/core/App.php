<?php

class App
{

    
    protected $controller = 'Home';
    protected $method = 'index';
    protected $paramters = [];

    public function __construct()
    {
       $url = $this->parseURL();

       if ($url === null || !file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
        $url[0] = $this->controller;
    } else {
        $this->controller = ucfirst($url[0]);
        unset($url[0]);
    }

       require_once '../app/controllers/' . $this->controller . 'Controller.php';

        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            if(isset($url[1]) && method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->paramters = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->paramters);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}