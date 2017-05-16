<div class="container">

    <ul class="collapsible" data-collapsible="accordion">
        
        <?php foreach($funcionarios as $funcionario ) :?>
            <li>
                <div class="collapsible-header user-select-none">
                    <i class="material-icons">account_circle</i> 
                    <?php echo $funcionario->funNome ?>
                </div>
                
                <div class="collapsible-body">
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
            </li>
        <?php endforeach;?>
    </ul>
</div>
 <div class="fixed-action-btn">
    <a href="funcionarios/create" class="btn-floating btn-large waves-effect waves-light red">
        <i class="material-icons" >add</i>
    </a>
  </div>