<?php

require_once('models/rota.php');

class RotasController
{
    public function index()
    {       
        $rotas = Rota::all(true);
        require_once('views/rotas/index.php');
    }

    public function create()
    {
        $rota = new Rota();
        require_once('views/rotas/create.php');
    }

    public function edit($id)
    {
        $rota = Rota::getRota($id);
        require_once('views/rotas/edit.php');
    }


    public function salvar()
    {
        $rota = Rota::fromArray($_POST);

        if($rota->rtaID != null)
            Rota::update($rota);
        else
            Rota::create($rota);
        
        RouteManager::redirectTo("rotas","");
    }

    public function excluir($id)
    {
        Rota::excluir($id);

        RouteManager::redirectTo("rotas","");
    }
}