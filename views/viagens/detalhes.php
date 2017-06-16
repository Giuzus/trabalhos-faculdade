<div class="container">

    <h5>Viagem: </h5>

    <table class="bordered">
        <tr>
            <td>
                ID:
            </td>
            <td>
                <?php echo $viagem->viaID ?>
            </td>
        </tr>
        <tr>
            <td>
                Data:
            </td>
            <td>
                <?php echo $viagem->viaData ?>
            </td>
        </tr>
        <tr>
            <td>
                Observação:
            </td>
            <td>
                <?php echo $viagem->viaObs ?>
            </td>
        </tr>
        <tr>
            <td>
                Km inicial:
            </td>
            <td>
                <?php echo $viagem->viaKmIni ?>
            </td>
        </tr>
        <tr>
            <td>
                Km final:
            </td>
            <td>
                <?php echo $viagem->viaKmFim ?>
            </td>
        </tr>
    </table>
    
    <br/>
    <h5> Funcionário: </h5>
    
    
    <table class="bordered">
        <tr>
            <td>
                ID:
            </td>
            <td>
                <?php echo $viagem->funcionarioNavigation->funID ?>
            </td>
        </tr>
        <tr>
            <td>
                Nome:
            </td>
            <td>
                <?php echo $viagem->funcionarioNavigation->funNome ?>
            </td>
        </tr>
        <tr>
            <td>
                Endereço:
            </td>
            <td>
                <?php echo $viagem->funcionarioNavigation->funEnder ?>
            </td>
        </tr>
        <tr>
            <td>
                Fone:
            </td>
            <td>
                <?php echo $viagem->funcionarioNavigation->funFone ?>
            </td>
        </tr>
        <tr>
            <td>
                Data Nascimento
            </td>
            <td>
                <?php echo $viagem->funcionarioNavigation->funDtNasc ?>
            </td>
        </tr>
        <tr>
            <td>
                Classe:
            </td>
            <td>
                <?php echo $viagem->funcionarioNavigation->funClasse ?>
            </td>
        </tr>
        <tr>
            <td>
                Categoria:
            </td>
            <td>
                <?php echo $viagem->funcionarioNavigation->funCateg ?>
            </td>
        </tr>
    </table>


    <br/>
    <h5> Veículo: </h5>
    
    
    <table class="bordered">
        <tr>
            <td>
                ID:
            </td>
            <td>
                <?php echo $viagem->veiculoNavigation->veiID ?>
            </td>
        </tr>
        <tr>
            <td>
                Descrição:
            </td>
            <td>
                <?php echo $viagem->veiculoNavigation->veiDescr ?>
            </td>
        </tr>
        <tr>
            <td>
                Ano:
            </td>
            <td>
                <?php echo $viagem->veiculoNavigation->veiAno ?>
            </td>
        </tr>
        <tr>
            <td>
                Placa:
            </td>
            <td>
                <?php echo $viagem->veiculoNavigation->veiPlaca ?>
            </td>
        </tr>
        <tr>
            <td>
                Categoria:
            </td>
            <td>
                <?php echo $viagem->veiculoNavigation->veiCateg ?>
            </td>
        </tr>
    </table>



    <br/>
    <h5> Rota: </h5>
    <table class="bordered">
        <tr>
            <td>
                ID:
            </td>
            <td>
                <?php echo $viagem->rtaNavigation->rtaID ?>
            </td>
        </tr>
        <tr>
            <td>
                Nome:
            </td>
            <td>
                <?php echo $viagem->rtaNavigation->rtaNome ?>
            </td>
        </tr>
        <tr>
            <td>
                QtInerm:
            </td>
            <td>
                <?php echo $viagem->rtaNavigation->rtaQtInterm ?>
            </td>
        </tr>
        <tr>
            <td>
                ID Filial:
            </td>
            <td>
                <?php echo $viagem->rtaNavigation->filID ?>
            </td>
        </tr>

    </table>

    <br/>
    <h5> Despesas: </h5>
    <table class="bordered" style="margin-bottom: 20px">
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Data
                </td>
                <td>
                    Descrição
                </td>
                <td>
                    Valor
                </td>
                <td>

                </td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viagem->despesasNavigation as $despesa) :?>
                <tr>
                    <td>
                        <?php echo $despesa->dspSeq ?>
                    </td>
                    <td>
                        <?php echo $despesa->dspData ?>
                    </td>
                    <td>
                        <?php echo $despesa->dspDescr ?>
                    </td>
                    <td>
                        <?php echo $despesa->dspValor ?>
                    </td>
                    <td>
                        <?php if(!isset($viagem->viaKmFim) || $viagem->viaKmFim == ""): ?>
                        <a href="viagens/removerDespesa?id=<?php echo $despesa->dspSeq ?>"> 
                            <i class="material-icons">
                                clear
                            </i>
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <div class="row">
        <div class="right" style="margin-bottom:20px">
            
            <?php if(!isset($viagem->viaKmFim) || $viagem->viaKmFim == ""): ?>

            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn" href="#modalCadastroDespesas">Adicionar despesa</a>

            <!-- Modal Structure -->
            <div id="modalCadastroDespesas" class="modal">
                <form id="encerrarViagemForm" action="viagens/adicionarDespesa" method="POST">
                    <div class="modal-content">
                        <h4>Adicionar despesa</h4>
                        <div class="row">
                            <input type="hidden" name="viaID" value="<?php echo $viagem->viaID ?>" />
                            <div class="input-field col s12">
                                <i class="material-icons prefix">input</i>
                                <input id="dspData" type="text" required  class="datepicker" name="dspData">
                                <label for="dspData">Data</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">input</i>
                                <input id="dspDescr" type="text" required maxlength="20" class="validate" name="dspDescr">
                                <label for="dspDescr">Descrição</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">input</i>
                                <input id="dspValor" type="number" required class="validate" name="dspValor">
                                <label for="dspValor">Valor</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="waves-effect waves-green btn-flat" type="submit" >
                            Confirmar
                        </button>
                        <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                        
                    </div>
                </form>
            </div>

            <?php endif; ?>
        </div>
    </div>
    <br/>
	
	<div class="right" style="margin-bottom:20px">
		
		<?php if(!isset($viagem->viaKmFim) || $viagem->viaKmFim == ""): ?>

		<!-- Modal Trigger -->
		<a class="waves-effect waves-light btn" href="#modalEncerrarViagem">Encerrar viagem</a>

		<!-- Modal Structure -->
		<div id="modalEncerrarViagem" class="modal">
			<form id="encerrarViagemForm" action="viagens/encerrarViagem" method="POST">
				<div class="modal-content">
					<h4>Encerrar viagem</h4>
					<p>Digite a kilometragem final do veículo para encerrar a viagem.</p>
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">input</i>
							<input type="hidden" name="viaID" value="<?php echo $viagem->viaID ?>" />
							<input id="viaKmFim" type="number" required  class="validate" name="viaKmFim">
							<label for="viaKmFim">Km fim</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="waves-effect waves-green btn-flat" type="submit" >
						Confirmar
					</button>
                    <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
				</div>
			</form>
		</div>

		<?php endif; ?>


		<a class="waves-effect waves-light btn" href="viagens">Voltar</a>

	</div>
</div>

<script type="text/javascript" src="views/viagens/scripts/detalhes.js"></script>
<script type="text/javascript" src="content/imported/jquery-validation/jquery.validate.min.js"></script>
