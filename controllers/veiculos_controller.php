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

    public function edit($id)
    {
        $veiculo = Veiculo::getVeiculo($id);
        require_once('views/veiculos/edit.php');
    }


    public function salvar()
    {
        //TODO: ADICIONAR VALIDAÇÃO

        $veiculo = Veiculo::fromArray($_POST);

        if($veiculo->veiID != null)
            Veiculo::update($veiculo);
        else
            Veiculo::create($veiculo);
        
        RouteManager::redirectTo("veiculos","");
    }

    public function excluir($id)
    {
        Veiculo::excluir($id);

        RouteManager::redirectTo("veiculos","");
    }

    public function buscar($placa){

            $veiculos = Veiculo::buscar($placa);
        require_once('views/veiculos/index.php');

    }


}