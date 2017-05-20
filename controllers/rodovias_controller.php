<?php

require_once('models/rodovia.php');

class RodoviasController
{
    public function index()
    {       
        $rodovias = Rodovia::all();
        require_once('views/rodovias/index.php');
    }

    public function create()
    {
        $rodovia = new Rodovia();
        require_once('views/rodovias/create.php');
    }

    public function edit($id)
    {
        $rodovia = Rodovia::getRodovia($id);
        require_once('views/rodovias/edit.php');
    }

    public function salvar()
    {
        $rodovia = Rodovia::fromArray($_POST);

        if($rodovia->rodID != null)
            Rodovia::update($rodovia);
        else
            Rodovia::create($rodovia);
        
        RouteManager::redirectTo("rodovias","");
    }

    public function excluir($id)
    {
        Rodovia::excluir($id);

        RouteManager::redirectTo("rodovias","");
    }
}