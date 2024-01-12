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

    public function search($search)
    {
        $searchitem = implode("", $search);
        // echo json_encode($searchitem);
        $search = $this->Objwiki->getSearchWikis($searchitem);
        echo  json_encode($search);
    }

    public function params($array)
    {
        $idwiki = implode("", $array);
        
        $read = $this->Objwiki->readWiki($idwiki);
        $tagswiki = $this->Objwiki->getWikiTags($idwiki);
        if($read)
        {
            $this->view('home/details', ['read' => $read, 'tagswiki' => $tagswiki]);
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