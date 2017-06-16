<?php

require_once('util.php');
require_once('models/viagem.php');

class Veiculo
{
    public $veiID;
    public $veiDescr;
    public $veiAno;
    public $veiPlaca;
    public $veiCateg;

    public $viagensNavigation;


    public function __construct()
    {
        return true;
    }

    public static function fromArray($array)
    {
        return dePara($array, new self());
    }

    public static function all($inicializaNavigation = false)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM Veiculos');

        foreach ($req->fetchAll() as $row) {
            $veiculo =  Veiculo::fromArray($row);
            
            if ($inicializaNavigation) {
                $veiculo->inicializaNavigations();
            }

            $list[] = $veiculo;
        }

        return $list;
    }

    public static function getVeiculo($id, $inicializaNavigation = false)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Veiculos WHERE veiID = :veiID ');
        $statement->bindParam(':veiID', $id);
        $statement->execute();

        $row = $statement->fetch();

        $veiculo = Veiculo::fromArray($row);

        if ($inicializaNavigation) {
            $veiculo->inicializaNavigations();
        }

        return $veiculo;
    }

    public function inicializaNavigations()
    {
        $this->viagensNavigation = Viagem::getViagensByIdVeiculo($this->veiID);
    }

    public static function buscar($placa)
    {
        $placa = '%'.$placa.'%';
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Veiculos WHERE veiPlaca like :veiPlaca ');
        $statement->bindParam(':veiPlaca', $placa );
        $statement->execute();

        foreach ($statement->fetchAll() as $row) {
            $retorno[] = Veiculo::fromArray($row);
        }

        return $retorno;
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

    public static function update($veiculo)
    {
        $db = Db::getInstance();
        
        $statement = $db->prepare('UPDATE Veiculos SET veiDescr = :veiDescr, veiAno = :veiAno, veiPlaca = :veiPlaca, veiCateg = :veiCateg WHERE veiID = :veiID');
        $statement->bindParam(':veiID', intval($veiculo->veiID), PDO::PARAM_INT);
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


    public static function getQuantidadeVeiculosPorAno()
    {
        $db = Db::getInstance();

        $req = $db->prepare('call getQtdVeiculosPorAno()');

        $req->execute();
        
        $data = $req->fetchAll();

        return $data;
    }
}
