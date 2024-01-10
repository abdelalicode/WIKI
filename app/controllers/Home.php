<?php
include_once "../app/models/Wiki.php";

class Home
{
    public $Objwiki;

    public function __construct()
    {
        $this->Objwiki = new Wiki();
    }

    public function index()
    {
        $wikis = $this->Objwiki->getWikis();
        $categories = $this->Objwiki->getCategories();
        $this->view('home/index', ['wikis' => $wikis, 'categories' => $categories]);
    }


    public function params($array)
    {
        $idwiki = implode("", $array);
        
        $read = $this->Objwiki->readWiki($idwiki);
        if($read)
        {
            $this->view('home/details', ['read' => $read]);
        }
    }


    // View Methods
    public function view($view, $data = [])
    {
        extract($data);
        require_once '../app/views/'. $view .'.php';
    }

    public function viewonly($view)
    {
        include '../app/views/'. $view .'.php';
    }


}