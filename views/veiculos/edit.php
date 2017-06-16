<?php if(isset($veiculo) && $veiculo instanceof Veiculo) { ?>
<div class="container">
    <br>
    <h5>Editar Veículo</h5>
    <form action="veiculos/salvar" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">description</i>
                <input id="veiDescr" type="text" required class="validate" name="veiDescr" value="<?php echo $veiculo->veiDescr ?>">
                <label for="veiDescr">Descrição do veículo</label>
            </div>
        </div>

        <div class="row">

            <div class="input-field col s4">
                <i class="material-icons prefix">date_range</i>
                <input id="veiAno" type="text" required class="validate" name="veiAno" value="<?php echo $veiculo->veiAno ?>">
                <label for="veiAno">Ano do veículo</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">directions_car</i>
                <input id="veiPlaca" type="text" required class="validate" name="veiPlaca" value="<?php echo $veiculo->veiPlaca ?>">
                <label for="veiPlaca">Placa do veículo</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">class</i>
                <select name"veiCateg" required name="veiCateg">
                    <option value="" disabled>Selecione</option>
                    <option value="1" <?php echo $veiculo->veiCateg == 1 ? "selected" : "" ?> >Bruto</option>
                    <option value="2" <?php echo $veiculo->veiCateg == 2 ? "selected" : "" ?> >Pesado</option>
                    <option value="3" <?php echo $veiculo->veiCateg == 3 ? "selected" : "" ?> >Dilatado</option>
                </select>
                <label>Categoria do veículo</label>
            </div>              

        </div>

        <div class="row">
            <input type="hidden" value="<?php echo $veiculo->veiID ?>" name="veiID">
            <button class="btn waves-effect waves-light right" type="submit">Confirmar
                <i class="material-icons right">send</i>
            </button>
        </div>

    </form>
</div>

<?php } ?>



<script type="text/javascript" src="views/funcionarios/scripts/create.js"></script>