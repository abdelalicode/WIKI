<?php
//namespace app\core;
session_start();

class App
{

    
    protected $controller = 'Home';
    protected $method = 'index';
    protected $paramters = [];

    public function __construct()
    {
       $url = $this->parseURL();


       if ($url === null || !file_exists('../app/controllers/' . $url[0] . '.php')) {
        $url[0] = $this->controller;
    } else {

        $this->controller = ucfirst($url[0]);
        unset($url[0]);
    }

       require_once '../app/controllers/' . $this->controller . '.php';

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

        call_user_func_array([$this->controller, $this->method], [$this->paramters]);
    }

    public function parseURL()
    {
        return explode('/', filter_var(trim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));

        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}