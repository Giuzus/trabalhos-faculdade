<div class="container">
    <form>
        <div class="row">
            <div class="input-field col s9">
                <i class="material-icons prefix">account_circle</i>
                <input id="funNome" type="text" required class="validate">
                <label for="funNome">Nome</label>
            </div>
        

            <div class="input-field col s3">
                <i class="material-icons prefix">pregnant_woman</i>
                <input id="funDtNasc" type="date" required class="datepicker">
                <label for="funDtNasc">Data Nascimento</label>
            </div>
        </div>

        <div class="row">

            <div class="input-field col s8">
                <i class="material-icons prefix">home</i>
                <input id="funEnder" type="text" required class="validate">
                <label for="funEnder">Endereço</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">phone</i>
                <input id="funFone" type="text" required class="validate">
                <label for="funFone">Telefone</label>
            </div>
            

        </div>

        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">face</i>
                <select name"funCateg" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="Categoria 1">Categoria 1</option>
                    <option value="Categoria 2">Categoria 2</option>
                    <option value="Categoria 3">Categoria 3</option>
                </select>
                <label>Categoria</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">class</i>
                <select name"funClasse" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="Classe 1">Classe 1</option>
                    <option value="Classe 2">Classe 2</option>
                    <option value="Classe 3">Classe 3</option>
                </select>
                <label>Classe</label>
            </div>
        </div>

        <div class="row">
            <button class="btn waves-effect waves-light right" type="submit" name="confirma">Confirmar
                <i class="material-icons right">send</i>
            </button>
        </div>

    </form>
</div>



<script type="text/javascript" src="views/funcionarios/scripts/create.js"></script>