<?php

require_once('util.php');

class Rota
{
    public $rtaID;
    public $rtaNome;
    public $rtaQtInterm;
    public $filID;

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
        $req = $db->query('SELECT * FROM Rotas');

        foreach ($req->fetchAll() as $row) {
            $list[] = Rota::fromArray($row);
        }

        return $list;
    }

    public static function getRota($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Rotas WHERE rtaID = :rtaID ');
        $statement->bindParam(':rtaID', $id);
        $statement->execute();

        $row = $statement->fetch();

        return Rota::fromArray($row);
    }

    public static function create($rota)
    {
        $db = Db::getInstance();

        $statement = $db->prepare('INSERT INTO Rotas (rtaNome, rtaQtInterm, filID) VALUES (:rtaNome, :rtaQtInterm, :filID)');
        $statement->bindParam(':rtaNome', $rota->rtaNome);
        $statement->bindParam(':rtaQtInterm', $rota->rtaQtInterm);
        $statement->bindParam(':filID', intval($rota->filID), PDO::PARAM_INT);
        $statement->execute();
    }

    public static function update($rota)
    {
        $db = Db::getInstance();
        
        $statement = $db->prepare('UPDATE Rotas SET rtaNome = :rtaNome, rtaQtInterm = :rtaQtInterm, filID = :filID WHERE rtaID = :rtaID');
        $statement->bindParam(':rtaID', intval($rota->rtaID), PDO::PARAM_INT);
        $statement->bindParam(':rtaNome', $rota->rtaNome);
        $statement->bindParam(':rtaQtInterm', $rota->rtaQtInterm);
        $statement->bindParam(':filID', intval($rota->filID), PDO::PARAM_INT);
        $statement->execute();
    }

    public static function excluir($id)
    {
        $db = Db::getInstance();
        
        $req = $db->prepare('DELETE FROM Rotas WHERE rtaID = ' . $id);
        $req->execute();
    }
}