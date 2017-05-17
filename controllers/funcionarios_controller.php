<?php

require_once('models/funcionario.php');

class FuncionariosController
{
        
        
    public function index()
    {
        $funcionarios = Funcionario::all();
        require_once('views/funcionarios/index.php');
    }

    public function create()
    {
        $funcionario = new Funcionario();
        require_once('views/funcionarios/create.php');
    }


    public function salvar()
    {
        //TODO: ADICIONAR VALIDAÇÃO

        $funcionario = Funcionario::fromArray($_POST);

        $data = date_parse($funcionario->funDtNasc);

        $funcionario->funDtNasc = sprintf("%s-%s-%s", $data["year"],
                                                        $data["month"],
                                                        $data["day"]);

        Funcionario::create($funcionario);
        
        RouteManager::redirectTo("funcionarios","");
    }

    public function excluir($id){

        Funcionario::excluir($id);

        RouteManager::redirectTo("funcionarios","");

    }
}
