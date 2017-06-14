<?php

require_once('util.php');

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

    //TODO: Como é um metodo generico, pode ser movido para algum lugar
    //para não precisar ser criado sempre que se cria uma model;
    public static function fromArray($array)
    {
        return dePara($array, new self());
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
        (<{viaID: }>,
        <{viaData: }>,
        <{viaObs: }>,
        <{viaKmIni: }>,
        <{viaKmFim: }>,
        <{funID: }>,
        <{veiID: }>,
        <{rtaID: }>);
        ');
        $statement->bindParam(':viaID',     $id );
        $statement->bindParam(':viaData',   $viagem->viaData);
        $statement->bindParam(':viaObs',    $viagem->viaObs );
        $statement->bindParam(':viaKmIni',  $viagem->viaKmIni );
        $statement->bindParam(':viaKmFim',  $viagem->viaKmFim );
        $statement->bindParam(':funID',     $viagem->funID );
        $statement->bindParam(':veiID',     $viagem->veiID );
        $statement->bindParam(':rtaID',     $viagem->rtaID );
        $statement->execute();
    }
}
