<div class="container">
    <br />
    <h5>Rotas</h5>
    <ul class="collapsible" data-collapsible="accordion">
        
        <?php foreach($rotas as $rota) :?>
            <li>
                <div class="collapsible-header user-select-none">
                    <i class="material-icons">description</i> 
                    <span>Nome: <?php echo $rota->rtaNome ?></span>
                </div>
                
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <span>rtaQtInterm: </span>
                            <?php echo $rota->rtaQtInterm ?>
                            <br/>
                            
                            <span>Filial: </span>
                            <?php echo $rota->filID ?>
                        </div>
                        <div class="col s6">
                            <a href="rotas/excluir?id=<?php echo $rota->rtaID ?>">
                                <i class="material-icons icon-grey right bottom">delete_forever</i> 
                            </a>
                            <a href="rotas/edit?id=<?php echo $rota->rtaID ?>">
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
    <a href="rotas/create" class="btn-floating btn-large waves-effect waves-light red">
        <i class="material-icons" >add</i>
    </a>
</div>