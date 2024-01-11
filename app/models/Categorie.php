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

    public function updateCategorie()
    {
            $sqlupdcat = "UPDATE `categorie` SET `name`= ? WHERE `id`='[value-1]'";
            $stmtupcat = $this->connect()->prepare($sqlupdcat);
            return $stmtupcat->execute([$this->name]);
    }

    public function deleteCategorie()
    {
            $sqldeldcat = "DELETE FROM `categorie` WHERE `id`='[value-1]'";
            $stmtdelcat = $this->connect()->prepare($sqldeldcat);
            return $stmtdelcat->execute();
    }
}
