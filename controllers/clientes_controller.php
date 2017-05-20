<?php

require_once('models/cliente.php');

class ClientesController
{
    public function index()
    {       
        $clientes = Cliente::all();
        require_once('views/clientes/index.php');
    }

    public function create()
    {
        $cliente = new Cliente();
        require_once('views/clientes/create.php');
    }

    public function edit($id)
    {
        $cliente = Cliente::getCliente($id);
        require_once('views/clientes/edit.php');
    }


    public function salvar()
    {
        $cliente = Cliente::fromArray($_POST);

        if($cliente->cliID != null)
            Cliente::update($cliente);
        else
            Cliente::create($cliente);
        
        RouteManager::redirectTo("clientes","");
    }

    public function excluir($id)
    {
        Cliente::excluir($id);

        RouteManager::redirectTo("clientes","");
    }
}