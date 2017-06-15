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
	
	<div class="right" style="margin-bottom:20px">
		
		<?php if(!isset($viagem->viaKmFim) || $viagem->viaKmFim == ""): ?>

		<!-- Modal Trigger -->
		<a class="waves-effect waves-light btn" href="#modalEncerrarViagem">Modal</a>

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
					<a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
					<button class="waves-effect waves-green btn-flat" type="submit" >
						Confirmar
					</button>
				</div>
			</form>
		</div>

		<?php endif; ?>


		<a class="waves-effect waves-light btn" href="viagens">Voltar</a>

	</div>
</div>

<script type="text/javascript" src="views/viagens/scripts/detalhes.js"></script>