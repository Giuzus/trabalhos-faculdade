
$(document).ready(function () {

    $('.modal').modal({
        ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
            //inicializaDatepicker();
        },
    });

    inicializaDatepicker();

	$("#encerrarViagemForm").validate({
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

function inicializaDatepicker(){
    $('.datepicker').pickadate({
        selectYears: 80,
        formatSubmit: 'yyyy/mm/dd',
        format: 'dd/mm/yyyy',
        hiddenSuffix: ''
    });
}