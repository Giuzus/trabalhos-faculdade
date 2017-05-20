
<div class="container">
    <br>
    <h5>Criar nova Rota</h5>
    <form action="rotas/salvar" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">map</i>
                <input id="rtaNome" type="text" required class="validate" name="rtaNome">
                <label for="rtaNome">Nome</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">info_outline</i>
                <input id="rtaQtInterm" type="number" required class="validate" name="rtaQtInterm">
                <label for="rtaQtInterm">QtInterm</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">class</i>
                <select name"filID" required name="filID">
                    <option value="" disabled selected>Selecione</option>
                    <option value="1">Filial 1</option>
                    <option value="2">Filial 2</option>
                    <option value="3">Filial 3</option>
                </select>
                <label>Filial</label>
            </div>  
        </div>

        <div class="row">
            <button class="btn waves-effect waves-light right" type="submit">Confirmar
                <i class="material-icons right">send</i>
            </button>
        </div>

    </form>
</div>



<script type="text/javascript" src="views/funcionarios/scripts/create.js"></script>