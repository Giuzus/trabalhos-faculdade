
$(document).ready(function () {
    $('select').material_select();

    $('.datepicker').pickadate({
        selectYears: 80,
        formatSubmit: 'yyyy/mm/dd',
        format: 'dd/mm/yyyy',
        hiddenSuffix: ''
    });


    //para não ignorar os hidden fields (faz a validação do dropdown funfar)
    $.validator.setDefaults({
        ignore: []
    });

    $("#createFuncionarioForm").validate({
        rules: {
            //inserir regras especiais    
        },
        errorClass: 'invalid',
        errorPlacement: function (error, element) {

            $(element)
                .closest('.select-wrapper')
                .find('.select-dropdown')
                .addClass('invalid');

            return true;
        }
    });
});