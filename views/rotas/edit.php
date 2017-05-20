<?php if(isset($rota) && $rota instanceof Rota) { ?>
<div class="container">
    <br>
    <h5>Editar rota <?php $rota->rtaNome ?></h5>
    <form action="rotas/salvar" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">map</i>
                <input id="rtaNome" type="text" required class="validate" name="rtaNome" value="<?php echo $rota->rtaNome ?>">
                <label for="rtaNome">Nome</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">info_outline</i>
                <input id="rtaQtInterm" type="number" required class="validate" name="rtaQtInterm" value="<?php echo $rota->rtaQtInterm ?>">
                <label for="rtaQtInterm">QtInterm</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">class</i>
                <select name"filID" required name="filID">
                    <option value="<?php echo $rota->filID ?>"><?php echo $rota->filID ?></option>
                </select>
                <label>Filial</label>
            </div>  
        </div>

        <div class="row">
            <input type="hidden" value="<?php echo $rota->rtaID ?>" name="rtaID">
            <button class="btn waves-effect waves-light right" type="submit">Confirmar
                <i class="material-icons right">send</i>
            </button>
        </div>

    </form>
</div>

<?php } ?>

<script type="text/javascript" src="views/funcionarios/scripts/create.js"></script>