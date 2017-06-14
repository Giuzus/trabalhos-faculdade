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
}
