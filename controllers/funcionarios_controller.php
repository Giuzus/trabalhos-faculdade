<?php

    require_once('models/funcionario.php');

    class FuncionariosController {
        public function index() {
            
            $funcionarios = Funcionario::all();
            require_once('views/funcionarios/list.php');
        }
    }
?>