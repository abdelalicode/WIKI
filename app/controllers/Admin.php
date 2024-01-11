<?php
include "../app/models/User.php";
include "../app/models/Categorie.php";
include "../app/models/Tag.php";

class Admin
{
   
    public function index()
    {
        $this->viewonly('dashboard/dashdir');
    }

    public function cats()
    {
        $Objcat = new Categorie();
        $catgs = $Objcat->getCategorie();
        $this->view('dashboard/dashcat', ['catgs' => $catgs]);
    }

    public function tags()
    {
        $Objtag = new Tag();
        $tags = $Objtag->getTags();
        $this->view('dashboard/dashtag', ['tags' => $tags]);
    }



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