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

    public static function excluir($id)
    {
        $db = Db::getInstance();
        
        $req = $db->prepare('DELETE FROM Funcionarios WHERE funID = ' . $id);
        $req->execute();

    }
}
