<?php

require_once('util.php');

class Cliente
{
    public $cliID;
    public $cliNome;
    public $cliFone;
    public $cliCPF;
    public $cliRG;
    public $cliEndereco;
    public $cliCEP;
    public $locID;

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
        $req = $db->query('SELECT * FROM Clientes');

        foreach ($req->fetchAll() as $row) {
            $list[] = Cliente::fromArray($row);
        }

        return $list;
    }

    public static function getCliente($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Clientes WHERE cliID = :cliID ');
        $statement->bindParam(':cliID', $id);
        $statement->execute();

        $row = $statement->fetch();

        return Cliente::fromArray($row);
    }

    public static function create($cliente)
    {
        $db = Db::getInstance();

        $statement = $db->prepare(
                'INSERT INTO Clientes (cliNome, cliFone, cliCPF, cliRG, cliEndereco, cliCEP, locID) 
                VALUES (:cliNome, :cliFone, :cliCPF, :cliRG, :cliEndereco, :cliCEP, :locID)'
        );
        $statement->bindParam(':cliNome', $cliente->cliNome);
        $statement->bindParam(':cliFone', $cliente->cliFone);
        $statement->bindParam(':cliCPF', $cliente->cliCPF);
        $statement->bindParam(':cliRG', $cliente->cliRG);
        $statement->bindParam(':cliEndereco', $cliente->cliEndereco);
        $statement->bindParam(':cliCEP', $cliente->cliCEP);
        $statement->bindParam(':locID', intval($cliente->locID), PDO::PARAM_INT);
        $statement->execute();
    }

    public static function update($cliente)
    {
        $db = Db::getInstance();
        
        $statement = $db->prepare('UPDATE Clientes SET cliNome = :cliNome, cliFone = :cliFone, cliCPF = :cliCPF, cliRG = :cliRG, cliEndereco = :cliEndereco, cliCEP = :cliCEP, locID = :locID WHERE cliID = :cliID');
        $statement->bindParam(':cliID', intval($cliente->cliID), PDO::PARAM_INT);
        $statement->bindParam(':cliNome', $cliente->cliNome);
        $statement->bindParam(':cliFone', $cliente->cliFone);
        $statement->bindParam(':cliCPF', $cliente->cliCPF);
        $statement->bindParam(':cliRG', $cliente->cliRG);
        $statement->bindParam(':cliEndereco', $cliente->cliEndereco);
        $statement->bindParam(':cliCEP', $cliente->cliCEP);
        $statement->bindParam(':locID', intval($cliente->locID), PDO::PARAM_INT);
        $statement->execute();
    }

    public static function excluir($id)
    {
        $db = Db::getInstance();
        
        $req = $db->prepare('DELETE FROM Clientes WHERE cliID = ' . $id);
        $req->execute();
    }
}