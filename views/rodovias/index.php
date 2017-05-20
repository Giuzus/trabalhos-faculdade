<div class="container">
    <br />
    <h5>Rodovias</h5>
    <ul class="collapsible" data-collapsible="accordion">
        
        <?php foreach($rodovias as $rodovia) :?>
            <li>
                <div class="collapsible-header user-select-none">
                    <i class="material-icons">description</i> 
                    <span>Nome: <?php echo $rodovia->rodNome ?></span>
                </div>
                
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s12">
                            <div class="col s6">
                                <span>Nome: </span>
                                <?php echo $rodovia->rodNome ?>
                                <br/>
                            </div>
                            <a href="rodovias/excluir?id=<?php echo $rodovia->rodID ?>">
                                <i class="material-icons icon-grey right bottom">delete_forever</i> 
                            </a>
                            <a href="rodovias/edit?id=<?php echo $rodovia->rodID ?>">
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
    <a href="rodovias/create" class="btn-floating btn-large waves-effect waves-light red">
        <i class="material-icons" >add</i>
    </a>
</div>