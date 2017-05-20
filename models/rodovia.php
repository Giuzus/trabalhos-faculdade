<?php

require_once('util.php');

class Rodovia
{
    public $rodID;
    public $rodNome;

    public function __construct()
    {
        return true;
    }

    public static function fromArray($array)
    {
        return dePara($array, new self());
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM Rodovias');

        foreach ($req->fetchAll() as $row) {
            $list[] = Rodovia::fromArray($row);
        }

        return $list;
    }

    public static function getRodovia($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Rodovias WHERE rodID = :rodID ');
        $statement->bindParam(':rodID', $id);
        $statement->execute();

        $row = $statement->fetch();

        return Rodovia::fromArray($row);
    }

    public static function create($rodovia)
    {
        $db = Db::getInstance();

        $req = $db->query('SELECT rodID FROM Rodovias ORDER BY 1 DESC');
        $ret = $req->fetch();

        $id = $ret[0][0] + 1;

        $statement = $db->prepare('INSERT INTO Rodovias (rodID, rodNome) VALUES (:rodID, :rodNome)');
        $statement->bindParam(':rodID',  $id);
        $statement->bindParam(':rodNome', $rodovia->rodNome);
        $statement->execute();
    }

    public static function update($rodovia)
    {
        $db = Db::getInstance();
        
        $statement = $db->prepare('UPDATE Rodovias SET rodNome = :rodNome WHERE rodID = :rodID');
        $statement->bindParam(':rodID', intval($rodovia->rodID), PDO::PARAM_INT);
        $statement->bindParam(':rodNome', $rodovia->rodNome);
        $statement->execute();
    }

    public static function excluir($id)
    {
        $db = Db::getInstance();
        
        $req = $db->prepare('DELETE FROM Rodovias WHERE rodID = ' . $id);
        $req->execute();
    }
}