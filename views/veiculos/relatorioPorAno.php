
<div class="container">
    <br />
    <h5>Quantidade de veículos por ano</h5>

    <table>

        <thead>
            <tr>
                <td>
                    Ano
                </td>
                <td>
                    Quantidade
                </td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row) :?>
            <tr>
                <td>
                    <?php echo $row['Ano'] ?>
                </td>

                <td>
                    <?php echo $row['Qtd'] ?>                
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <a type="button" href="veiculos/index" class="btn waves-effect waves-light" >Voltar</a>
</div>