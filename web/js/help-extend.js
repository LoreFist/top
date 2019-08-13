$(document).ready(function () {
    $('#extend_submit').on('click', function () {

        $('#requests-optional').val($('#optional').html()); //копируем значение из div в наш инпут-optional

        $(this).addClass('bth__loader--animate'); //анимация трех точек для кнопки

        var _form_data = $('#form-extend').serializeArray();

        _form_data.push({'name': 'country_direction', 'value': $('#country_direction').html()});
        _form_data.push({'name': 'city_direction', 'value':  $('#city_direction').html()});
        $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/saveextend',
                data: _form_data
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


    var _sumoselect_country = $('.sumo-direction-country');
    var _sumoselect_department = $('.sumo-department');
    var _sumoselect_city= $('.sumo-direction-city');

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
        var _id = $(this).attr('data_id');
        var _text_select_city = $(this).find('option:selected').html();
        _sumoselect_city = $('#sumo-direction-city-'+_id);

        $('#country_direction-'+_id).html(_text_select_city);
        $(this).closest('.formDirections').removeClass('d-ib');

        if (_sumoselect_city.hasClass('SumoUnder')) {
            _sumoselect_city[0].sumo.unload();
            $('#city_direction').html('Не важно');
        }

        $('#country_direction_Flag-'+_id).attr('class', 'tour-selection__flag');
        $('#country_direction_Flag-'+_id).addClass('lsfw-flag lsfw-flag-' + $(this).val());

        $.ajax({
                type: 'post',
                dataType: 'html',
                _csrf: yii.getCsrfToken(),
                url: '/getcity',
                data: {
                    'id': $(this).val(),
                    _csrf: yii.getCsrfToken()
                }
            }
        )
        .done(function (data) {
            $('#sumo-direction-city-'+_id).html(data);
            $('#text-city-select-'+_id).html(_text_select_city);

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
        var _id = $(this).attr('data_id');
        $('#city_direction-'+_id).html($(this).find('option:selected').html());
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

    //выбор города вылета
    _sumoselect_department.change(function (event) {
        var _id = $(this).attr('data_id');
        $('#city_department-'+_id).html($(this).find('option:selected').html());
        $(this).closest('.formDirections').hide();
    });

    //добавить удалить дополнительные контролы турпакета
    $('.js-add-field').on('click', function () {
        $('.js-show-added-field').each(function () {
            if ($(this).is(":hidden")) {
                $(this).show();
                return false;
            }
        });
    });

    $('.js-del-field').on('click', function () {
        $('.js-show-added-field').each(function () {
            if ($(this).is(":visible")) {
                $(this).hide();
                return false;
            }
        });
    });
});