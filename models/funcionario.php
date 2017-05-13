<?php

class Funcionario {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $funID;
    public $funNome;
    public $funEnder;
    public $funFone;
    public $funDtNasc;
    public $funClasse;
    public $funCateg;

    public function __construct($funID,
                                $funNome,
                                $funEnder,
                                $funFone,
                                $funDtNasc,
                                $funClasse,
                                $funCateg) {

      $this->funID      = $funID;
      $this->funNome    = $funNome;
      $this->funEnder   = $funEnder;
      $this->funFone    = $funFone;
      $this->funDtNasc  = $funDtNasc;
      $this->funClasse  = $funClasse;
      $this->funCateg   = $funCateg;
    }

    public static function all() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM Funcionarios');

		// we create a list of Post objects from the database results
		foreach($req->fetchAll() as $viagem) {
			$list[] = new Funcionario(	$viagem['funID'], 
                                  $viagem['funNome'],
                                  $viagem['funEnder'],
                                  $viagem['funFone'],
                                  $viagem['funDtNasc'],
                                  $viagem['funClasse'],
                                  $viagem['funCateg']);
		}

		return $list;
    }

    // public static function find($id) {
    //   $db = Db::getInstance();
    //   // we make sure $id is an integer
    //   $id = intval($id);
    //   $req = $db->prepare('SELECT * FROM Posts WHERE Id = :id');
    //   // the query was prepared, now we replace :id with our actual $id value
    //   $req->execute(array('id' => $id));
    //   $post = $req->fetch();

    //   return new Post($post['Id'], $post['Author'], $post['Content']);
    // }
  }

?>
