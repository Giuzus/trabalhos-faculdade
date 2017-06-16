<?php

require_once('util.php');

class Despesa
{
	public $dspSeq;
	public $dspData;
	public $dspDescr;
	public $dspValor;
	public $viaID;

	public static function fromArray($array)
    {
        return dePara($array, new self());
    }

	public static function getDespesa($id)
	{
		$db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Despesas WHERE dspSeq = :dspSeq ');
        $statement->bindParam(':dspSeq', $id);
        $statement->execute();

        $row = $statement->fetch();

        return Despesa::fromArray($row);
	}

	public static function getAllByIdViagem($id)
	{
		$db = Db::getInstance();

		$statement = $db->prepare('SELECT * from Despesas where viaID = :viaID');
		$statement->bindParam(':viaID', $id);
		$statement->execute();
		$list = [];

		foreach ($statement->fetchAll() as $row) {
            $list[] = Despesa::fromArray($row);
        }

        return $list;
	}

	public static function create($despesa)
	{
		$db = Db::getInstance();
		
		$req = $db->query('SELECT count(1) FROM Despesas');
		$ret = $req->fetchAll();

		$id = $ret[0][0];
		
		$id++;

		$statement = $db->prepare('INSERT INTO `Trasportadora_DB`.`Despesas`
		(`dspSeq`,
		`dspData`,
		`dspDescr`,
		`dspValor`,
		`viaID`)
		VALUES
		(:dspSeq,
		 :dspData,
		 :dspDescr,
		 :dspValor,
		 :viaID)');


		$statement->bindParam(':dspSeq', $id);
		$statement->bindParam(':dspData', $despesa->dspData);
		$statement->bindParam(':dspDescr', $despesa->dspDescr);
		$statement->bindParam(':dspValor', $despesa->dspValor);
		$statement->bindParam(':viaID', $despesa->viaID);
		
		$statement->execute();
	}

	public static function delete($id)
	{
		$db = Db::getInstance();

		$despesa = Despesa::getDespesa($id);
		$statement = $db->prepare('DELETE from Despesas where dspSeq = :dspSeq');

		$statement->bindParam(':dspSeq', $id);
		$statement->execute();
		return $despesa;
	}
}
