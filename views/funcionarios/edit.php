<?php if (isset($funcionario) && $funcionario instanceof Funcionario) { ?>
<div class="container">
    <br>
    <h5>Editar Funcionário</h5>

    <form id="createFuncionarioForm" action="funcionarios/salvar" method="post">
        <div class="row">
            <div class="input-field col s9">
                <i class="material-icons prefix">account_circle</i>
                <input id="funNome" type="text" required class="validate" name="funNome" value="<?php echo $funcionario->funNome ?>" >
                <label for="funNome">Nome</label>
            </div>
        

            <div class="input-field col s3">
                <i class="material-icons prefix">pregnant_woman</i>
                <label for="funDtNasc">Data Nascimento</label>
                <input id="funDtNasc" type="date" required class="datepicker" name="funDtNasc" value="<?php echo $funcionario->funDtNasc ?>" >
                
            </div>
        </div>

        <div class="row">

            <div class="input-field col s8">
                <i class="material-icons prefix">home</i>
                <input id="funEnder" type="text" required class="validate" name="funEnder" value="<?php echo $funcionario->funEnder ?>" >
                <label for="funEnder">Endereço</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">phone</i>
                <input id="funFone" type="text" required class="validate" name="funFone" value="<?php echo $funcionario->funFone ?>" >
                <label for="funFone">Telefone</label>
            </div>
            

        </div>

        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">face</i>
                <select id="funCateg" required class="validate" name="funCateg">
                    <option value=""  >Selecione</option>
                    <option value="1" <?php echo $funcionario->funCateg == 1 ? "selected" : "" ?> >Cat1</option>
                    <option value="2" <?php echo $funcionario->funCateg == 2 ? "selected" : "" ?> >Cat2</option>
                    <option value="3" <?php echo $funcionario->funCateg == 3 ? "selected" : "" ?> >Cat3</option>
                </select>
                <label>Categoria</label>
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">class</i>
                <select id="funClasse" required class="validate" name="funClasse">
                    <option value="">Selecione</option>
                    <option value="1" <?php echo $funcionario->funClasse == 1 ? "selected" : "" ?> >1</option>
                    <option value="2" <?php echo $funcionario->funClasse == 2 ? "selected" : "" ?> >2</option>
                    <option value="3" <?php echo $funcionario->funClasse == 3 ? "selected" : "" ?> >3</option>
                </select>
                <label>Classe</label>
            </div>
        </div>

        <div class="row">
            <input type="hidden" value="<?php echo $funcionario->funID ?>" name="funID">
            <button class="btn waves-effect waves-light right" type="submit">Confirmar
                <i class="material-icons right">send</i>
            </button>
        </div>

    </form>
</div>


<?php } ?>

<script type="text/javascript" src="views/funcionarios/scripts/create.js"></script>
<script type="text/javascript" src="content/imported/jquery-validation/jquery.validate.min.js"></script>