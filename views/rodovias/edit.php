<?php if(isset($rodovia) && $rodovia instanceof Rodovia) { ?>
<div class="container">
    <br>
    <h5>Editar rodovia <?php $rodovia->rodNome ?></h5>
    <form action="rodovias/salvar" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">map</i>
                <input id="rodNome" type="text" required class="validate" name="rodNome" value="<?php echo $rodovia->rodNome ?>">
                <label for="rodNome">Nome</label>
            </div>
        </div>

        <div class="row">
            <input type="hidden" value="<?php echo $rodovia->rodID ?>" name="rodID">
            <button class="btn waves-effect waves-light right" type="submit">Confirmar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

<?php } ?>