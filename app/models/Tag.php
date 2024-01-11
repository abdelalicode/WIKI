<?php
include_once "../app/core/database.php";


class Tag extends Db
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


    public function getTags()
    {
            $sqlalltag = "SELECT * FROM tag";
             return $this->connect()->query($sqlalltag)->fetchAll(PDO::FETCH_OBJ);         
    }

    public function setTags()
    {
            $sqlsettag = "INSERT INTO tag (`name`) VALUES (?)";
            $stmttag = $this->connect()->prepare($sqlsettag);
            return $stmttag->execute([$this->name]);
    }

    public function updateTags()
    {
            $sqlupdtag = "UPDATE `tag` SET `name`= ? WHERE `id`='[value-1]'";
            $stmtuptag = $this->connect()->prepare($sqlupdtag);
            return $stmtuptag->execute([$this->name]);
    }

    public function deleteTags()
    {
            $sqldeltag = "DELETE FROM `tag` WHERE `id`='[value-1]'";
            $stmtdeltag = $this->connect()->prepare($sqldeltag);
            return $stmtdeltag->execute();
    }
}
