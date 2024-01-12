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

    public function setTag()
    {
            $sqlsettag = "INSERT INTO tag (`name`) VALUES (?)";
            $stmttag = $this->connect()->prepare($sqlsettag);
            return $stmttag->execute([$this->name]);
    }

    public function updateTag($name, $idup)
    {
            $sqlupdtag = "UPDATE `tag` SET `name`= ? WHERE `id`=?";
            $stmtuptag = $this->connect()->prepare($sqlupdtag);
            return $stmtuptag->execute([$name, $idup]);
    }

    public function deleteTag($id)
    {
            $sqldeltag = "DELETE FROM `tag` WHERE `id`=$id";
            $stmtdeltag = $this->connect()->prepare($sqldeltag);
            return $stmtdeltag->execute();
    }
}
