<?php
include_once "../app/core/database.php";


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
            $sqlallwiki = "SELECT * FROM wikis WHERE `status` = 1 ORDER BY creation_date DESC";
             return $this->connect()->query($sqlallwiki)->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSearchWikis($searchitem)
    {
            $sqlsearchwiki = "SELECT wikis.*, categorie.name  AS category, GROUP_CONCAT(tag.name) AS tags FROM wikis INNER JOIN categorie ON wikis.cat_id = categorie.id LEFT JOIN wikitag ON wikitag.wiki_id = wikis.id LEFT JOIN tag ON tag.id = wikitag.tag_id  where wikis.title like '%$searchitem%' or tag.name like '%$searchitem%' or categorie.name like '%$searchitem%' GROUP BY wikis.id"; 
             return $this->connect()->query($sqlsearchwiki)->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserWikis($userid)
    {
            $sqlallwiki = "SELECT * FROM wikis WHERE `user_id` = $userid";
            return $this->connect()->query($sqlallwiki)->fetchAll(PDO::FETCH_OBJ);
    }


    public function addWiki($title, $content, $categorie, $iduser)
    {
        $sqladdw = "INSERT INTO wikis ( `title`, `content`,`cat_id`, `user_id`) VALUES (? , ? , ? , ?)";
        $stmtaddwiki = $this->connect()->prepare($sqladdw);
        $stmtaddwiki->execute([$title, $content, $categorie, $iduser]);
        return $this->connect()->lastInsertId();
    }

    public function insertWikiTag($addwiki, $choice)
    {
        $sqladdwtg = "INSERT INTO `wikitag`(`tag_id`, `wiki_id`) VALUES (? , ?)";
        $stmtaddwikitag = $this->connect()->prepare($sqladdwtg);
        return $stmtaddwikitag->execute([$choice, $addwiki]);
    }

    public function updateWiki($title, $content, $idup)
    {
        $sqlupdw = "UPDATE `wikis` SET `title`= ? ,`content`= ? WHERE `id`= ?";
        $stmtupdwiki = $this->connect()->prepare($sqlupdw);
        return $stmtupdwiki->execute([$title, $content, $idup]);
    }

    public function getArchivedWikis()
    {
            $sqlallwiki = "SELECT * FROM wikis WHERE `status` = 0 ORDER BY creation_date DESC";
             return $this->connect()->query($sqlallwiki)->fetchAll(PDO::FETCH_OBJ);
    }

    public function ArchiveWiki($idwiki)
    {
        $sqlarchive = "UPDATE `wikis` SET `status` = '0' WHERE `wikis`.`id` = $idwiki";
        $stmtarchwiki = $this->connect()->prepare($sqlarchive);
        return $stmtarchwiki->execute();
    }


    public function deleteWiki($idd)
    {
            $sqldeldwiki = "DELETE FROM `wikis` WHERE `id`=$idd";
            $stmtdelwiki = $this->connect()->prepare($sqldeldwiki);
            return $stmtdelwiki->execute();
    }

    public function getCategories()
    {
            $sqlallcat = "SELECT * FROM categorie ORDER BY dated DESC";
             return $this->connect()->query($sqlallcat)->fetchAll(PDO::FETCH_OBJ);
    }

    public function readWiki($idwiki)
    {
            $sqlallwiki = "SELECT wikis.title, wikis.content, wikis.creation_date, categorie.name, users.firstname, users.lastname FROM wikis  JOIN CATEGORIE on wikis.cat_id = categorie.id JOIN users on wikis.user_id = users.id WHERE `status` = 1 AND wikis.id = $idwiki";
             return $this->connect()->query($sqlallwiki)->fetchAll(PDO::FETCH_OBJ);
    }

    public function getWikiTags($idwiki)
    {
        $sqltagwiki ="SELECT * FROM tag JOIN wikitag on tag.id = wikitag.tag_id JOIN wikis on wikitag.wiki_id = wikis.id WHERE wikis.id = $idwiki";
        return $this->connect()->query($sqltagwiki)->fetchAll(PDO::FETCH_OBJ);
    }

    public function getwikiStats(){
        $sqlstatwiki = "SELECT COUNT(*) FROM wikis";
        return $this->connect()->query($sqlstatwiki)->fetchColumn();
    }
}
