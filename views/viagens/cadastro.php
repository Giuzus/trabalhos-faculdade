
<div class="container">
    <br>
    <h5>Criar nova viagem</h5>
    <form id="createViagemForm" action="viagens/salvar" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">input</i>
                <input id="viaData" type="text" required  class=" datepicker" name="viaData">
                <label for="viaData">Data</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">input</i>
                <textarea id="viaObs" name="viaObs" required class="materialize-textarea" data-length="80"></textarea>
                <label for="viaObs">Observação</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">input</i>
                <input id="viaKmIni" required type="number" required class="validate" name="viaKmIni">
                <label for="viaKmIni">Km inicial</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">input</i>
                <select required name="funID">
                    <option value="" disabled selected>Selecione</option>

                    <?php foreach ($funcionariosDDL as $funcionario) :?>
                        <option value="<?php echo $funcionario->funID ?>"> <?php echo $funcionario->funNome ?> </option>
                    <?php endforeach;?>

                </select>
                <label>Funcionario</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">input</i>
                <select required name="veiID">
                    <option value="" disabled selected>Selecione</option>

                    <?php foreach ($veiculosDDL as $veiculo) :?>
                        <option value="<?php echo $veiculo->veiID ?>"> <?php echo $veiculo->veiPlaca . ' (' . $veiculo->veiDescr . ')' ?> </option>
                    <?php endforeach;?>
                </select>
                <label>Veiculo</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">input</i>
                <select required name="rtaID">
                    <option value="" disabled selected>Selecione</option>

                    <?php foreach ($rotasDDL as $rota) :?>
                        <option value="<?php echo $rota->rtaID ?>"> <?php echo $rota->rtaNome ?> </option>
                    <?php endforeach;?>
                </select>
                <label>Rota</label>
            </div>
        </div>
        <div class="input-field col s12 right">
            <a class="waves-effect waves-light btn" href="viagens">Voltar</a>
            <button class="btn waves-effect waves-light" type="submit" >
                Salvar
            </button>
        </div>
    </form>
</div>

<script type="text/javascript" src="views/viagens/scripts/cadastro.js"></script>
<script type="text/javascript" src="content/imported/jquery-validation/jquery.validate.min.js"></script>