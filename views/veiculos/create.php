
<div class="container">
    <form action="veiculos/salvar" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">description</i>
                <input id="veiDescr" type="text" required class="validate" name="veiDescr">
                <label for="veiDescr">Descrição do veículo</label>
            </div>
        </div>

        <div class="row">

            <div class="input-field col s4">
                <i class="material-icons prefix">date_range</i>
                <input id="veiAno" type="text" required class="validate" name="veiAno">
                <label for="veiAno">Ano do veículo</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">directions_car</i>
                <input id="veiPlaca" type="text" required class="validate" name="veiPlaca">
                <label for="veiPlaca">Placa do veículo</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">class</i>
                <select name"veiCateg" required name="veiCateg">
                    <option value="" disabled selected>Selecione</option>
                    <option value="1">Bruto</option>
                    <option value="2">Pesado</option>
                    <option value="3">Dilatado</option>
                </select>
                <label>Categoria do veículo</label>
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