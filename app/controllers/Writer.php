<?php
include "../app/models/Categorie.php";
include "../app/models/Tag.php";
include "../app/models/Wiki.php";

class Writer
{
    private $Objcate;
    private $Objtags;
    private $Objwikis;


    public function __construct()
    {
        $this->Objcate = new Categorie();
        $this->Objtags = new Tag();
        $this->Objwikis = new Wiki();
    }

    public function addwikibutton()
    {
        $allcats = $this->Objcate->getCategorie();
        $alltags = $this->Objtags->getTags();
        $this->view('view/addwiki', ['allcats' => $allcats, 'alltags' => $alltags]);
    }

    public function addwiki()
    {
        extract($_POST);
        $iduser = $_SESSION['id'];
        $addwiki = $this->Objwikis->addWiki($title, $content, $categorie, $iduser);
        foreach ($_POST['selectedChoices'] as $choice) {
            $this->Objwikis->insertWikiTag($addwiki, $choice);
        }
        header("Location: /Writer/getuserwiki");
    }


    public function getuserwiki()
    {
        $userid = $_SESSION['id'];
        $userwikis = $this->Objwikis->getUserWikis($userid);
        $this->view('writer/userwikis', ['userwikis' => $userwikis]);
    }


    public function deletewiki($array)
    {
        $idd = implode("", $array);

        $delw = $this->Objwikis->deleteWiki($idd);
        if ($delw) {
            $this->getuserwiki();
        }
    }


    public function updatewiki()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $idup = $_POST['id'];
        $updatewiki = $this->Objwikis->updateWiki($title, $content, $idup);
        if($updatewiki)
        {
            $this->getuserwiki();
        }
    }


    public function view($view, $data = [])
    {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }
}
