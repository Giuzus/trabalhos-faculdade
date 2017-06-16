<div class="container">
    
    <div class="row">

        <div class="input-field right">
            <a class="waves-effect waves-light btn" href="viagens/cadastro">Nova viagem</a>
        </div>
        
        <div class="col s12">

            <table>
                <thead>
                    <tr>
                        <td></td>
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
                        <td>Total despesas</td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($viagens as $viagem) :?>

                        <tr>
                            <td>
                                <?php if(isset ($viagem->viaKmFim) && $viagem->viaKmFim != "") : ?>
                                    <i class="material-icons tooltipped" data-position="top" data-tooltip="Viagem encerrada" > info </i>
                                <?php endif;?>
                            </td>
                            <td> <?php echo $viagem->viaData  ?> </td>
                            <td> <?php echo $viagem->viaObs  ?></td>
                            <td> <?php echo $viagem->viaKmIni  ?></td>
                            <td> <?php echo $viagem->viaKmFim  ?></td>
                            <td> <?php echo $viagem->funcionarioNavigation->funNome ?></td>
                            <td> <?php echo $viagem->rtaNavigation->rtaNome ?></td>
                            <td>
                                <?php
                                    $total = 0;
                                    foreach ($viagem->despesasNavigation as $despesa) {
                                        $total += $despesa->dspValor;
                                    }
                                    echo $total;
                                ?>

                            </td>
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

