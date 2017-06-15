<?php

require_once('util.php');

class Funcionario
{
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $funID;
    public $funNome;
    public $funEnder;
    public $funFone;
    public $funDtNasc;
    public $funClasse;
    public $funCateg;

    public function __construct()
    {
        return true;
    }

    public static function fromParams(
        $funID,
        $funNome,
        $funEnder,
        $funFone,
        $funDtNasc,
        $funClasse,
        $funCateg
    ) {
        $instance = new self();
        $instance->funID      = $funID;
        $instance->funNome    = $funNome;
        $instance->funEnder   = $funEnder;
        $instance->funFone    = $funFone;
        $instance->funDtNasc  = $funDtNasc;
        $instance->funClasse  = $funClasse;
        $instance->funCateg   = $funCateg;

        return $instance;
    }

    public static function fromArray($array)
    {
        return dePara($array,new self());
    }

    public static function getFuncionario($id)
    {
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Funcionarios WHERE funID = :funID ');
        $statement->bindParam(':funID', $id);
        $statement->execute();

        $row = $statement->fetch();

        return Funcionario::fromArray($row);
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM Funcionarios');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $row) {
            $list[] = Funcionario::fromArray($row);
        }

        return $list;
    }

    public static function buscar($nome)
    {
        $nome = '%'. $nome .'%';
        $db = Db::getInstance();
        $statement = $db->prepare('SELECT * FROM Funcionarios WHERE funNome like :funNome ');
        $statement->bindParam(':funNome', $nome );
        $statement->execute();

        foreach ($statement->fetchAll() as $row) {
            $retorno[] = Funcionario::fromArray($row);  
        }

        return $retorno;
    }

    public static function create($funcionario)
    {
        $db = Db::getInstance();
        
        $req = $db->query('SELECT count(1) FROM Funcionarios');
        $ret = $req->fetchAll();

        $id = $ret[0][0];
        
        $id++;

        $query = sprintf("INSERT INTO Funcionarios VALUES ( %s, '%s', '%s', '%s', '%s', '%s', '%s')", $id,
                                                                                              $funcionario->funNome,
                                                                                              $funcionario->funEnder,
                                                                                              $funcionario->funFone,
                                                                                              $funcionario->funDtNasc,
                                                                                              $funcionario->funClasse,
                                                                                              $funcionario->funCateg);

        $req = $db->query($query);
    }

    public static function update($funcionario)
    {
        $db = Db::getInstance();
        
        $statement = $db->prepare('UPDATE Funcionarios SET funNome   = :funNome,
                                                          funEnder  = :funEnder,
                                                          funFone   = :funFone,
                                                          funDtNasc = :funDtNasc,
                                                          funClasse = :funClasse,
                                                          funCateg  = :funCateg
                            WHERE funID = :funID');


        $statement->bindParam(':funID', intval($funcionario->funID), PDO::PARAM_INT);
        $statement->bindParam(':funNome', $funcionario->funNome);
        $statement->bindParam(':funEnder', $funcionario->funEnder);
        $statement->bindParam(':funFone', $funcionario->funFone);
        $statement->bindParam(':funDtNasc', $funcionario->funDtNasc);
        $statement->bindParam(':funClasse', $funcionario->funClasse);
        $statement->bindParam(':funCateg', $funcionario->funCateg);
        
        $statement->execute();
    }

    public static function excluir($id)
    {
        $db = Db::getInstance();
        
        $req = $db->prepare('DELETE FROM Funcionarios WHERE funID = ' . $id);
        $req->execute();

    }
}
