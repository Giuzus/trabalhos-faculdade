
$(document).ready(function () {

	$('.modal').modal();

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