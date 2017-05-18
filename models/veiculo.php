<?php

require_once('util.php');

class Veiculo
{
    public $veiID;
    public $veiDescr;
    public $veiAno;
    public $veiPlaca;
    public $veiCateg;

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
        $req = $db->query('SELECT * FROM Veiculos');

        foreach ($req->fetchAll() as $row) {
            $list[] = Veiculo::fromArray($row);
        }

        return $list;
    }

    public static function create($veiculo)
    {
        $db = Db::getInstance();
        
        $req = $db->query('SELECT count(1) FROM Veiculos');
        $ret = $req->fetchAll();

        $id = $ret[0][0];
        
        $id++;

        $statement = $db->prepare('INSERT INTO Veiculos VALUES ( :veiID, :veiDescr, :veiAno, :veiPlaca, :veiCateg)');
        $statement->bindParam(':veiID', $veiculo->veiID);
        $statement->bindParam(':veiDescr', $veiculo->veiDescr);
        $statement->bindParam(':veiAno', $veiculo->veiAno);
        $statement->bindParam(':veiPlaca', $veiculo->veiPlaca);
        $statement->bindParam(':veiCateg', $veiculo->veiCateg);
        $statement->execute();
    }

    public static function excluir($id)
    {
        $db = Db::getInstance();
        
        $req = $db->prepare('DELETE FROM Veiculos WHERE veiID = ' . $id);
        $req->execute();
    }

}