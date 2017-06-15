<div class="container">
    
    <div class="row">

        <div class="input-field col s12 right">
            <a class="waves-effect waves-light btn" href="viagens/cadastro">Nova viagem</a>
        </div>
        
        <div class="col s12">

            <table>
                <thead>
                    <tr>
                        <td>
                            Data
                        </td>
                        <td>
                            Observacao
                        </td>
                        <td>
                            Km inicial
                        </td>
                        <td>
                            Km final
                        </td>
                        <td>
                            Nome funcionario
                        </td>
                        <td>
                            Rota
                        </td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($viagens as $viagem) :?>

                        <tr>
                            <td> <?php echo $viagem->viaData  ?> </td>
                            <td> <?php echo $viagem->viaObs  ?></td>
                            <td> <?php echo $viagem->viaKmIni  ?></td>
                            <td> <?php echo $viagem->viaKmFim  ?></td>
                            <td> <?php echo $viagem->funcionarioNavigation->funNome ?></td>
                            <td> <?php echo $viagem->rtaNavigation->rtaNome ?></td>
                            <td> 
                                <a href="<?php echo "viagens/detalhes?id=". $viagem->viaID ?>">
                                    <i class="material-icons">
                                        remove_red_eye
                                    </i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach;?>
                </tbody>
            </table>

        </div>

    </div>

</div>

