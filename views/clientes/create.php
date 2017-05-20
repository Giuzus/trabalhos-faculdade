
<div class="container">
    <br>
    <h5>Criar novo Cliente</h5>
    <form id="createClienteForm" action="clientes/salvar" method="post">
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">account_circle</i>
                <input id="cliNome" type="text" required class="validate" name="cliNome">
                <label for="cliNome">Nome</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">phone</i>
                <label for="cliFone">Telefone</label>
                <input id="cliFone" type="text" required class="validate" name="cliFone">                
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">info_outline</i>
                <input id="cliCPF" type="text" required class="validate" name="cliCPF">
                <label for="cliCPF">CPF</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">info_outline</i>
                <input id="cliRG" type="text" required class="validate" name="cliRG">
                <label for="cliRG">RG</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">pin_drop</i>
                <select name"locID" required name="locID">
                    <option value="" disabled selected>Selecione</option>
                    <option value="1">Localidade 1</option>
                    <option value="2">Localidade 2</option>
                    <option value="3">Localidade 3</option>
                </select>
                <label>Localidade</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">home</i>
                <input id="cliEndereco" type="text" required class="validate" name="cliEndereco">
                <label for="cliEndereco">Endereço</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">place</i>
                <input id="cliCEP" type="text" required class="validate" name="cliCEP">
                <label for="cliCEP">CEP</label>
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
<script type="text/javascript" src="content/imported/jquery-validation/jquery.validate.min.js"></script>