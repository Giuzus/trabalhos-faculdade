<?php

require_once('models/veiculo.php');

class VeiculosController
{
    public function index()
    {       
        $veiculos = Veiculo::all();
        require_once('views/veiculos/index.php');
    }

    public function create()
    {
        $veiculo = new Veiculo();
        require_once('views/veiculos/create.php');
    }


    public function salvar()
    {
        //TODO: ADICIONAR VALIDAÇÃO

        $veiculo = Veiculo::fromArray($_POST);

        Veiculo::create($veiculo);
        
        RouteManager::redirectTo("veiculos","");
    }

    public function excluir($id)
    {
        Veiculo::excluir($id);

        RouteManager::redirectTo("veiculos","");
    }
}