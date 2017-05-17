<div class="container">

    <ul class="collapsible" data-collapsible="accordion">
        
        <?php foreach($funcionarios as $funcionario ) :?>
            <li>
                <div class="collapsible-header user-select-none">
                    <i class="material-icons">account_circle</i> 
                    <span><?php echo $funcionario->funNome ?></span>
                </div>
                
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <span>Endereço: </span>
                            <?php echo $funcionario->funEnder ?>
                            <br/>
                            
                            <span>Telefone: </span>
                            <?php echo $funcionario->funFone ?>
                            <br/>
                        
                            <span>Data de nascimento: </span>
                            <?php echo $funcionario->funDtNasc ?>
                            <br/>
                            
                            <span>Classe: </span>
                            <?php echo $funcionario->funClasse ?>
                            <br/>

                            <span>Categoria: </span>
                            <?php echo $funcionario->funCateg ?>
                        </div>
                        <div class="col s6">
                            <a href="funcionarios/excluir?id=<?php echo $funcionario->funID ?>">
                                <i class="material-icons icon-grey right bottom">delete_forever</i> 
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
</div>
 <div class="fixed-action-btn">
    <a href="funcionarios/create" class="btn-floating btn-large waves-effect waves-light red">
        <i class="material-icons" >add</i>
    </a>
  </div>