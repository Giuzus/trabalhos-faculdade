<div class="container">
    <br />
    <h5>Veículos</h5>

    <form class="row" action="veiculos/buscar" method="get" validate>
        <div class="input-field col s6 inline">
            <input placeholder="Placa" id="placa" name="placa" type="text" class="validate">
        </div>
        <div class="input-field inline">
            <button class="btn waves-effect waves-light" type="submit">Pesquisar
                <i class="material-icons right">send</i>
            </button>
        </div>
        <div class="input-field inline">
            <a type="button" href="veiculos/relatorioPorAno" class="btn waves-effect waves-light" >Relatorio veiculos por ano
            </a>
            
        </div>
    </form>

    <ul class="collapsible" data-collapsible="accordion">
        
        <?php foreach ($veiculos as $veiculo) :?>
            <li>
                <div class="collapsible-header user-select-none">
                    <i class="material-icons">description</i> 
                    <span>Descrição do veículo: <?php echo $veiculo->veiDescr ?></span>
                </div>
                
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s6">
                            <span>Ano: </span>
                            <?php echo $veiculo->veiAno ?>
                            <br/>
                            
                            <span>Placa: </span>
                            <?php echo $veiculo->veiPlaca ?>
                            <br/>
                        
                            <span>Categoria: </span>
                            <?php echo $veiculo->veiCateg ?>
                        </div>
                        <div class="col s6">

                            <?php if(count($veiculo->viagensNavigation) > 0 ): ?>
                            <a disabled class="tooltipped" data-position="top" data-tooltip="Não pode ser excluido pois está associado a uma viagem" >
                                <i class="material-icons icon-grey right bottom">delete_forever</i> 
                            </a>
                            <?php else: ?>
                            <a href="veiculos/excluir?id=<?php echo $veiculo->veiID ?>">
                                <i class="material-icons icon-grey right bottom">delete_forever</i> 
                            </a>
                            <?php endif; ?>

                            
                            <a href="veiculos/edit?id=<?php echo $veiculo->veiID ?>">
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
    <a href="veiculos/create" class="btn-floating btn-large waves-effect waves-light red">
        <i class="material-icons" >add</i>
    </a>
  </div>