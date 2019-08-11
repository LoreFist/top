$(document).ready(function () {
    $('#extend_submit').on('click', function () {

        $('#requests-optional').val($('#optional').html()); //копируем значение из div в наш инпут-optional

        $(this).addClass('bth__loader--animate'); //анимация трех точек для кнопки
        $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/',
                data: $('#form-extend').serializeArray()
            }
        )
            .done(function (data) {
                if (data['code'] == 1) {
                    $('#formPanel').html($('#thx').html());
                }
            })
    });


});