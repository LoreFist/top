$(document).ready(function () {
    var _countTourPach = 3; //количество направлений в турпакете
    var _sumoselect_country = $('.sumo-direction-country'); //селект поиска страны в турпакете
    var _sumoselect_departure = $('.sumo-departure'); //селект поиска город вылета в турпакете
    var _sumoselect_city = $('.sumo-direction-city'); //селект поиска города в турпакете
    var _sumoselect_city_tour = $('.sumo-list-city'); //селект поиска города в турпакете

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

    //формирование отображение города вылета
    _sumoselect_departure.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length > 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }
    });
    _sumoselect_departure.parent().addClass('open');
    _sumoselect_departure.next().next().css('top', '0').css('position', 'relative');

    //формирование отображение города турагентсва
    _sumoselect_city_tour.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length > 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }
    });
    _sumoselect_city_tour.parent().addClass('open');
    _sumoselect_city_tour.next().next().css('top', '0').css('position', 'relative');

    //сабмит формы турпакет
    $('#extend_submit').on('click', function () {
        $('#step1Panel').hide();
        $('#step2Panel').show();
    });

    $('#extend_step_submit').on('click', function (){
        console.log($('#city-tour').html());
        if($('#city-tour').html() == '')
            $('#sumo-list-city-2').val('')

        var $form = $('#form-extend');
        var data = $form.data("yiiActiveForm");

        console.log(data.attributes);
        $.each(data.attributes, function(e) {
            this.status = 3;
        });

        $form.yiiActiveForm("validate");

        var _valid = $form.find('.has-error').length;

        if(_valid == 0){
            $('#requests-optional').val($('#optional').html()); //копируем значение из div в наш инпут-optional

            $(this).addClass('bth__loader--animate'); //анимация трех точек для кнопки

            var _form_data = $('#form-extend').serializeArray();

            for(var i=0; i<_countTourPach; i++) {
                _form_data.push({'name':'city_id[]', 'value': $('#city_direction-'+i).html()});
                _form_data.push({'name':'country_id[]', 'value': $('#country_direction-'+i).html()});
                _form_data.push({'name':'departure_id[]', 'value': $('#direct_departure-'+i).html()});
            }

            $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/saveextend',
                    data: _form_data
                }
            )
                .done(function (data) {
                    if (data['code'] == 1) {
                        $('#step2Panel').html($('#thx').html());
                    }
                })
        }
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

    //очистка города поездки
    function sumoselectCityClear(_sumoselect_city, _id){
        if (_sumoselect_city.hasClass('SumoUnder')) {
            _sumoselect_city[0].sumo.unload();
            _sumoselect_city.removeClass('SumoUnder');
        }

        $('#city_direction-'+_id).html('Не важно');
        $('#text-city-select-'+_id).html('Укажите страну');
        _sumoselect_city.html(' ');
        _sumoselect_city    .hide();
    }

    //выбор страны поездки, установка флага и значения
    _sumoselect_country.change(function (event) {
        if($('#step1Panel').is(":hidden"))
            return false;

        var _id = $(this).attr('data_id');
        var _text_select_city = $(this).find('option:selected').html();
        _sumoselect_city = $('#sumo-direction-city-'+_id);

        $('#country_direction-'+_id).html(_text_select_city);
        $(this).closest('.formDirections').hide();

        sumoselectCityClear(_sumoselect_city, _id);

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

    //выбор города вылета
    _sumoselect_departure.change(function (event) {
        var _id = $(this).attr('data_id');
        $('#direct_departure-'+_id).html($(this).find('option:selected').html());
        $(this).closest('.formDirections').hide();
    });

    //выбор города турангества
    _sumoselect_city_tour.change(function (event) {
        var _id = $(this).attr('data_id');
        $('#city-tour').html($(this).find('option:selected').html());
        $('#city-tour-label').addClass('--center active');
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
        var _id = $(this).attr('data_id');
        _sumoselect_city = $('#sumo-direction-city-'+_id);
        $('.js-hide-dell-field-'+_id).hide();

        sumoselectCityClear(_sumoselect_city, _id);

        $('#city_direction-'+_id).html('Не важно');
        $('#direct_departure-'+_id).html('Не важно');
        $('#country_direction-'+_id).html('Не важно');
        $('#country_direction_Flag-'+_id).attr('class', 'tour-selection__flag');

        return false;
    });

    //сдвигает плейсхолдер
    $('.optional-js-field').on('click', function () {
        $(this).find('.bth__inp-lbl').addClass('active');
        $(this).closest('.js-show-saggest').next().show();
    });

    //возвращает плейсхолдер
    $('.optional-js-field').on('focusout', function () {
        if ($(this).val().trim() === '') {
            $(this).find('.bth__inp-lbl').removeClass('active');
            $(this).closest('.js-show-saggest').next().hide();
        }
    });
});