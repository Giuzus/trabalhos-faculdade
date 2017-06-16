<?php

require_once('util.php');
require_once('models/veiculo.php');
require_once('models/rota.php');
require_once('models/funcionario.php');
require_once('models/despesa.php');

class Viagem
{
    public $viaID;
    public $viaData;
    public $viaObs;
    public $viaKmIni;
    public $viaKmFim;
    public $funID;
    public $veiID;
    public $rtaID;


    public $funcionarioNavigation;
    public $veiculoNavigation;
    public $rtaNavigation;

    public $despesasNavigation;

    //TODO: Como é um metodo generico, pode ser movido para algum lugar
    //para não precisar ser criado sempre que se cria uma nova model;
    public static function fromArray($array)
    {
        $viagem = dePara($array, new self());
        $viagem->inicializaNavigations();
        return $viagem;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM Viagens');

        foreach ($req->fetchAll() as $row) {
            $list[] = Viagem::fromArray($row);
        }

        return $list;
    }

    public static function getViagem($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Viagens WHERE viaID = :viaID ');
        $statement->bindParam(':viaID', $id);
        $statement->execute();

        $row = $statement->fetch();

        return Viagem::fromArray($row);
    }


    public static function getViagensByIdFuncionario($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Viagens WHERE funID = :funID ');
        $statement->bindParam(':funID', $id);
        $statement->execute();

        $list = [];
        foreach ($statement->fetchAll() as $row) {
            $list[] = Viagem::fromArray($row);
        }

        return $list;
    }

    public static function getViagensByIdRota($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Viagens WHERE rtaID = :rtaID ');
        $statement->bindParam(':rtaID', $id);
        $statement->execute();

        $list = [];
        foreach ($statement->fetchAll() as $row) {
            $list[] = Viagem::fromArray($row);
        }

        return $list;
    }

    public static function getViagensByIdVeiculo($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Viagens WHERE veiID = :veiID ');
        $statement->bindParam(':veiID', $id);
        $statement->execute();

        $list = [];
        foreach ($statement->fetchAll() as $row) {
            $list[] = Viagem::fromArray($row);
        }

        return $list;
    }


    public function inicializaNavigations()
    {
        $this->funcionarioNavigation = Funcionario::getFuncionario($this->funID);
        $this->veiculoNavigation = Veiculo::getVeiculo($this->veiID);
        $this->rtaNavigation = Rota::getRota($this->rtaID);
        $this->despesasNavigation = Despesa::getAllByIdViagem($this->viaID);
    }

    public static function create($viagem)
    {
        $db = Db::getInstance();
        
        $req = $db->query('SELECT count(1) FROM Viagens');
        $ret = $req->fetchAll();

        $id = $ret[0][0];
        
        $id++;

        $statement = $db->prepare('INSERT INTO `Trasportadora_DB`.`Viagens`
        (`viaID`,
        `viaData`,
        `viaObs`,
        `viaKmIni`,
        `viaKmFim`,
        `funID`,
        `veiID`,
        `rtaID`)
        VALUES
        (:viaID,
         :viaData,
         :viaObs,
         :viaKmIni,
         :viaKmFim,
         :funID,
         :veiID,
         :rtaID);
        ');
        $statement->bindParam(':viaID', $id );
        $statement->bindParam(':viaData', $viagem->viaData);
        $statement->bindParam(':viaObs', $viagem->viaObs );
        $statement->bindParam(':viaKmIni', $viagem->viaKmIni );
        $statement->bindParam(':viaKmFim', $viagem->viaKmFim );
        $statement->bindParam(':funID', $viagem->funID );
        $statement->bindParam(':veiID', $viagem->veiID );
        $statement->bindParam(':rtaID', $viagem->rtaID );
        $statement->execute();
    }

    public static function update($viagem)
    {
        $db = Db::getInstance();

        $statement = $db->prepare('UPDATE `Trasportadora_DB`.`Viagens`
        SET
        `viaData`   = :viaData,
        `viaObs`    = :viaObs,
        `viaKmIni`  = :viaKmIni,
        `viaKmFim`  = :viaKmFim,
        `funID`     = :funID,
        `veiID`     = :veiID,
        `rtaID`     = :rtaID
        WHERE `viaID` = :viaID;
        ');
 
        $statement->bindParam(':viaID', $viagem->viaID);
        $statement->bindParam(':viaData', $viagem->viaData);
        $statement->bindParam(':viaObs', $viagem->viaObs );
        $statement->bindParam(':viaKmIni', $viagem->viaKmIni );
        $statement->bindParam(':viaKmFim', $viagem->viaKmFim );
        $statement->bindParam(':funID', $viagem->funID );
        $statement->bindParam(':veiID', $viagem->veiID );
        $statement->bindParam(':rtaID', $viagem->rtaID );
        $statement->execute();
    }
}
