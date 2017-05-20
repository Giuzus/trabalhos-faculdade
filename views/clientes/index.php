<div class="container">
    <br />
    <h5>Clientes</h5>
    <ul class="collapsible" data-collapsible="accordion">
        
        <?php foreach($clientes as $cliente) :?>
            <li>
                <div class="collapsible-header user-select-none">
                    <i class="material-icons">account_circle</i> 
                    <span>Nome: <?php echo $cliente->cliNome ?></span>
                </div>
                
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <span>Telefone: </span>
                            <?php echo $cliente->cliFone ?>
                            <br/>
                            
                            <span>CPF: </span>
                            <?php echo $cliente->cliCPF ?>
                            <br/>
                        
                            <span>RG: </span>
                            <?php echo $cliente->cliRG ?>
                            <br/>
                            
                            <span>Endereco: </span>
                            <?php echo $cliente->cliEndereco ?>
                            <br/>
                            
                            <span>CEP: </span>
                            <?php echo $cliente->cliCEP ?>
                            <br/>

                            <span>Localidade: </span>
                            <?php echo $cliente->locID ?>

                        </div>
                        <div class="col s6">
                            <a href="clientes/excluir?id=<?php echo $cliente->cliID ?>">
                                <i class="material-icons icon-grey right bottom">delete_forever</i> 
                            </a>
                            <a href="clientes/edit?id=<?php echo $cliente->cliID ?>">
                                <i class="material-icons icon-grey right bottom">mode_edit</i> 
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
</div>
<div class="fixed-action-btn">
    <a href="clientes/create" class="btn-floating btn-large waves-effect waves-light red">
        <i class="material-icons" >add</i>
    </a>
</div>