<?php

    require_once('models/funcionario.php');

    class FuncionariosController {
        
        
        public function index() {
            
            $funcionarios = Funcionario::all();
            require_once('views/funcionarios/index.php');
        }

        public function create()
        {
            require_once('views/funcionarios/create.php');
        }
        
        
    }
?>