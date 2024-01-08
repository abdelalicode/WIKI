<?php
include_once "../core/Controller.php";

class Home extends Controller
{
    public $Objwiki;

    public function __construct()
    {
        $this->Objwiki = new Wiki();
        
    }

    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index', ['name' => $user->name]);
        // echo $user->name;

    }

    public function params($array)
    {
        foreach($array as $arr){
            echo $arr;
        }
    }

    
    public function get()
    {
        $this->Objwiki->getWikis();
    }

   
    
}