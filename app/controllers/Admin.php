<?php
include "../app/models/User.php";
include "../app/models/Categorie.php";
include "../app/models/Tag.php";
include "../app/models/Wiki.php";

if($_SESSION['role_id']  != 1) {
    header("Location: /");
}
else {

class Admin
{
    private $Objcat;
    private $Objtag;
    private $Objwiki;
    private $Objuser;

    public function __construct()
    {
        $this->Objcat = new Categorie();
        $this->Objtag = new Tag();
        $this->Objwiki = new Wiki();
        $this->Objuser = new User();
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
        $updtag = $this->Objtag->updateTag($name, $idup);
        if($updtag)
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

    public function stats()
    {
        $wikistats = $this->Objwiki->getwikiStats();
        $userstats = $this->Objuser->getuserStats();
        if($wikistats && $userstats){
            $this->view('dashboard/dashstats', ['wikistats' => $wikistats, 'userstats' => $userstats]);
        }
    }

    public function activewikis()
    {
        $actwikis = $this->Objwiki->getWikis();
        if($actwikis){
            $this->view('dashboard/dashactwikis', ['actwikis' => $actwikis]);
        }
    }

    public function archivedwikis()
    {
        $archivewikis = $this->Objwiki->getArchivedWikis();
        
        $this->view('dashboard/dasharchivedwikis', ['archivewikis' => $archivewikis]);
    
    }

    public function archivethewiki()
    {
        $archivewikisàçytfdc = $this->Objwiki->getArchivedWikis();
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

}