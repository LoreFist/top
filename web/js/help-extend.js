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

    $('.js-show-formDirections').on('click', function () {

        $('.form-date + div').addClass('hidden');
        $(this).closest('html').find('.formDirections').hide();
        $(this).next('.formDirections').slideDown();

    });

    $('.formDirections__bottom-close, .formDirections__close-red, .js-close-formDirections, .formDirections__close-abs').on('click', function () {
        $(this).closest('.formDirections').hide();
    });

    var _sumoselect_country = $('#sumo-direction')
    _sumoselect_country.SumoSelect({
        search: true,
        forceCustomRendering: true
    });
    _sumoselect_country.parent().addClass('open');
    _sumoselect_country.next().next().css('top', '0').css('position', 'relative');
});