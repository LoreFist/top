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

    //отктыртие инпута, закрытие отсльных
    $('.js-show-formDirections').on('click', function () {

        $('.formDirections').each(function () {
            $(this).hide();
            $(this).removeClass('d-ib');
        });

        $(this).next('.formDirections').show();
    });

    //закрытие инпута
    $('.formDirections__bottom-close, .formDirections__close-red, .js-close-formDirections, .formDirections__close-abs').on('click', function () {
        $(this).closest('.formDirections').hide();
        $(this).closest('.formDirections').removeClass('d-ib');
    });


    var _sumoselect_country = $('#sumo-direction');
    var _sumoselect_city = $('#sumo-direction-city');
    var _sumoselect_department = $('#sumo-department');

    //формирование отображение страны поездки
    _sumoselect_country.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length > 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }
    });

    _sumoselect_country.parent().addClass('open');
    _sumoselect_country.next().next().css('top', '0').css('position', 'relative');

    //выбор страны поездки, установка флага и значения
    _sumoselect_country.change(function (event) {
        var _text_select_city = $(this).find('option:selected').html();
        $('#country_direction').html(_text_select_city);
        $(this).closest('.formDirections').removeClass('d-ib');

        if (_sumoselect_city.hasClass('SumoUnder')) {
            _sumoselect_city[0].sumo.unload();
            $('#city_direction').html('Не важно');
        }

        $('#country_direction_Flag').attr('class', 'tour-selection__flag');
        $('#country_direction_Flag').addClass('lsfw-flag lsfw-flag-' + _sumoselect_country.val());

        $.ajax({
                type: 'post',
                dataType: 'html',
                _csrf: yii.getCsrfToken(),
                url: '/getcity',
                data: {
                    'id': _sumoselect_country.val(),
                    _csrf: yii.getCsrfToken()
                }
            }
        )
            .done(function (data) {
                $('#sumo-direction-city').html(data);
                $('#text-city-select').html(_text_select_city);

                _sumoselect_city.SumoSelect({
                    search: true,
                    forceCustomRendering: true,
                    searchText: 'Искать...',
                    noMatch: 'Нет совпадений для "{0}"',
                    searchFn: function (haystack, needle) {
                        return needle.length > 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
                    }
                });
                _sumoselect_city.parent().addClass('open');
                _sumoselect_city.next().next().css('top', '0').css('position', 'relative');
            })
    });

    //выбор города
    _sumoselect_city.change(function (event) {
        $('#city_direction').html($(this).find('option:selected').html());
        $(this).closest('.formDirections').hide();
    });

    //формирование отображение города вылета
    _sumoselect_department.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length > 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }
    });
    _sumoselect_department.parent().addClass('open');
    _sumoselect_department.next().next().css('top', '0').css('position', 'relative');

});