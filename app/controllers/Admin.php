<?php
include "../app/models/User.php";
include "../app/models/Categorie.php";
include "../app/models/Tag.php";

class Admin
{
    private $Objcat;
    private $Objtag;

    public function __construct()
    {
        $this->Objcat = new Categorie();
        $this->Objtag = new Tag();
    }

    public function index()
    {
        $this->viewonly('dashboard/dashdir');
    }

    public function cats()
    {
        
        $catgs = $this->Objcat->getCategorie();
        $this->view('dashboard/dashcat', ['catgs' => $catgs]);
    }

    public function tags()
    {
        $tags = $this->Objtag->getTags();
        $this->view('dashboard/dashtag', ['tags' => $tags]);
    }

    public function insertag()
    {
        $name = $_POST['name'];
        $setag = $this->Objtag->setname($name);
        $insertag = $this->Objtag->setTag();
        if($insertag)
        {
            $this->tags();
        }
    }

    public function insercat()
    {
        $name = $_POST['name'];
        $secat = $this->Objcat->setname($name);
        $insertcat = $this->Objcat->setCategorie();
        if($insertcat)
        {
            $this->cats();
        }
    }
    
    public function updatecat()
    {
        $name = $_POST['name'];
        $idup = $_POST['id'];
        $updatecat = $this->Objcat->updateCategorie($name, $idup);
        if($updatecat)
        {
            $this->cats();
        }
    }


    public function updatetag()
    {
        $name = $_POST['name'];
        $idup = $_POST['id'];
        $updatetag = $this->Objtag->updateTag($name, $idup);
        if($updatetag)
        {
            $this->tags();
        }
    }
    

    public function deletet($array)
    {
        $id = implode("", $array);
        $delt = $this->Objtag->deleteTag($id);
        if($delt)
        {
            $this->tags();
        }
    }

    public function deletec($array)
    {
        $id = implode("", $array);
        
        $delc = $this->Objcat->deleteCategorie($id);
        if($delc)
        {
            $this->cats();
        }
    }


    // Render Methods
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