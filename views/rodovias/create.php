<div class="container">
    <br>
    <h5>Adicionar nova Rodovia</h5>
    <form action="rodovias/salvar" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">map</i>
                <input id="rodNome" type="text" required class="validate" name="rodNome">
                <label for="rodNome">Nome</label>
            </div>
        </div>

        <div class="row">
            <button class="btn waves-effect waves-light right" type="submit">Confirmar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>