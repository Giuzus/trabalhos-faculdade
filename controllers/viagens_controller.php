<?php

require_once('models/viagem.php');
require_once('models/funcionario.php');
require_once('models/veiculo.php');
require_once('models/rota.php');

class ViagensController
{
    public function index()
    {
        $viagens = Viagem::all();

        require_once('views/viagens/index.php');
    }

    public function cadastro()
    {
        $funcionariosDDL = Funcionario::all();
        $veiculosDDL = Veiculo::all();
        $rotasDDL = Rota::all();
        require_once ('views/viagens/cadastro.php');
    }

    public function detalhes($id)
    {
        $viagem = Viagem::getViagem($id);

        require_once('views/viagens/detalhes.php');
    }

    public function salvar()
    {
        $viagem = Viagem::fromArray($_POST);

        Viagem::create($viagem);
        
        RouteManager::redirectTo("viagens", "");
    }

    public function encerrarViagem()
    {
        $viaID = $_POST["viaID"];
        $kmFim = $_POST["viaKmFim"];

        $viagem = Viagem::getViagem($viaID);

        $viagem->viaKmFim = $kmFim;

        Viagem::update($viagem);
        
        RouteManager::redirectTo("viagens", "detalhes", "?id=".$viaID);
    }
}
