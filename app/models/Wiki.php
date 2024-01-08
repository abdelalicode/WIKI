<?php
include_once "../core/database.php";

class Wiki extends Db
{
    private $id;
    private $title;
    private $content;
    private $creation_date;
    private $status;

    // public function __construct($id, $title, $content, $creation_date, $status)
    // {
    //     $this->id = $id;
    //     $this->title = $title;
    //     $this->content = $content;
    //     $this->creation_date = $creation_date;
    //     $this->status = $status;
    // }

    public function getId()
    {
        return $this->id;
    }


    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

   
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getWikis()
    {
            $sqlallwiki = "SELECT * FROM wiki ORDER BY creation_date DESC";
            $result = $this->connect()->query($sqlallwiki)->fetchAll();

            foreach($result as $res) {
                echo $res->title;
            }
           

    }
}

$Objwiki = new Wiki();
$Objwiki->getWikis();