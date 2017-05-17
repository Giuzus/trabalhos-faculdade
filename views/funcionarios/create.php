
<div class="container">
    <form action="funcionarios/salvar" method="post">
        <div class="row">
            <div class="input-field col s9">
                <i class="material-icons prefix">account_circle</i>
                <input id="funNome" type="text" required class="validate" name="funNome">
                <label for="funNome">Nome</label>
            </div>
        

            <div class=" col s3">
                <!--<i class="material-icons prefix">pregnant_woman</i>-->
                <label for="funDtNasc">Data Nascimento</label>
                <input id="funDtNasc" type="date" required class="validate" name="funDtNasc">
                
            </div>
        </div>

        <div class="row">

            <div class="input-field col s8">
                <i class="material-icons prefix">home</i>
                <input id="funEnder" type="text" required class="validate" name="funEnder">
                <label for="funEnder">Endereço</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">phone</i>
                <input id="funFone" type="text" required class="validate" name="funFone">
                <label for="funFone">Telefone</label>
            </div>
            

        </div>

        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">face</i>
                <select name"funCateg" required name="funCateg">
                    <option value="" disabled selected>Selecione</option>
                    <option value="1">Cat1</option>
                    <option value="2">Cat2</option>
                    <option value="3">Cat3</option>
                </select>
                <label>Categoria</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">class</i>
                <select name"funClasse" required name="funClasse">
                    <option value="" disabled selected>Selecione</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <label>Classe</label>
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