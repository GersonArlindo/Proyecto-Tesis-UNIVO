$(function () {
    $('#modalButton').click(function () {
        $('#create-modal-alumno')
            .modal('show')
            .find('#createModalContent')
            .load($(this).attr('value'));
    });
});