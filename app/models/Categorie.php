<?php
include_once "../app/core/database.php";


class Categorie extends Db
{
    private $id;
    private $name;


    public function getId()
    {
        return $this->id;
    }


    public function setname($name)
    {
        $this->name = $name;
    }

    public function getname()
    {
        return $this->name;
    }


    public function getCategorie()
    {
            $sqlallcat = "SELECT * FROM categorie ORDER BY dated DESC";
             return $this->connect()->query($sqlallcat)->fetchAll(PDO::FETCH_OBJ);
             
    }

    public function setCategorie()
    {
            $sqlsetcat = "INSERT INTO categorie (`name`) VALUES (?)";
            $stmtcat = $this->connect()->prepare($sqlsetcat);
            return $stmtcat->execute([$this->name]);
    }

    public function updateCategorie($name , $idup)
    {
            $sqlupdcat = "UPDATE `categorie` SET `name`= ? WHERE `id`=?";
            $stmtupcat = $this->connect()->prepare($sqlupdcat);
            return $stmtupcat->execute([$name, $idup]);
    }

    public function deleteCategorie($id)
    {
            $sqldeldcat = "DELETE FROM `categorie` WHERE `id`=$id";
            $stmtdelcat = $this->connect()->prepare($sqldeldcat);
            return $stmtdelcat->execute();
    }
}
