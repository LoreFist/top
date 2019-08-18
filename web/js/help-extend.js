$(document).ready(function () {
    var _countTourPach = 3; //количество направлений в турпакете
    var _sumoselectCountry = $('.sumo-direction-country'); //селект поиска страны в турпакете
    var _sumoselectDeparture = $('.sumo-departure'); //селект поиска город вылета в турпакете
    var _sumoselectCity = $('.sumo-direction-city'); //селект поиска города в турпакете
    var _sumoselectCityTour = $('.sumo-list-city'); //селект поиска города в турпакете
    var _modelRequestId = 0;

    //формирование отображение страны поездки
    _sumoselectCountry.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length >= 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }

    });
    _sumoselectCountry.parent().addClass('open');
    _sumoselectCountry.next().next().css('top', '0').css('position', 'relative');

    //формирование отображение города вылета
    _sumoselectDeparture.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length >= 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }
    });
    _sumoselectDeparture.parent().addClass('open');
    _sumoselectDeparture.next().next().css('top', '0').css('position', 'relative');

    //формирование отображение города турагентсва
    _sumoselectCityTour.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length >= 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }
    });
    _sumoselectCityTour.parent().addClass('open');
    _sumoselectCityTour.next().next().css('top', '0').css('position', 'relative');

    //сабмит формы турпакет
    $('#extend_submit').on('click', function () {
        submitForm(false, $('#extend_submit'));
    });

    $('#extend_step_submit').on('click', function (){
        submitForm(true, $('#extend_step_submit'));
    });

    function submitForm(validation, buttonObj){
        var _valid = 0;

        $('#request-optional').val($('#optional').html()); //копируем значение из div в наш инпут-optional

        if($('#city-tour').html() == '')
            $('#sumo-list-city-3').val('')

        var $form = $('#form-extend');
        var data = $form.data("yiiActiveForm");

        if(validation) {
            $.each(data.attributes, function (e) {
                this.status = 3;
            });
            $form.yiiActiveForm("validate");

            var _valid = $form.find('.has-error').length;
        }

        if(_valid == 0){
            var date = new Date();
            $('#create_at').val(date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()+' '+date.getHours()+':'+date.getMinutes()+':'+date.getSeconds());

            buttonObj.addClass('bth__loader--animate'); //анимация трех точек для кнопки

            var _form_data = $('#form-extend').serializeArray();

            for(var i=0; i<_countTourPach; i++) {
                _form_data.push({'name':'city_id[]', 'value': $('#city_direction-'+i).html()});
                _form_data.push({'name':'country_id[]', 'value': $('#country_direction-'+i).html()});
                _form_data.push({'name':'departure_id[]', 'value': $('#direct_departure-'+i).html()});
                _form_data.push({'name':'location_id[]', 'value': $('#label-add-hotel-'+i).attr('data-id-location') });
            }
            _form_data.push({'name':'food_short_name', 'value': $('#label_food').html() });
            _form_data.push({'name':'departure_id[]', 'value': $('#direct_departure-4').html()});

            _form_data.push({'name':'modelRequestId', 'value': _modelRequestId});

            $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/saveextend',
                    data: _form_data
                }
            )
            .done(function (data) {
                if (data['code'] == 1) {
                    if(data['step'] == 1){
                        _modelRequestId = data['modelRequestId'];
                        $('#step1Panel').hide();
                        $('#step2Panel').slideDown();
                    }
                    else {
                        $('#step1Panel').html($('#thx').html());
                        $('#step2Panel').html($('#thx').html());
                    }
                }
            })
        }
    }

    //отктыртие инпута, закрытие отсльных
    $('.js-show-formDirections').on('click', function () {

        $('.formDirections').each(function () {
            $(this).hide();
            $(this).removeClass('d-ib');
        });

        $(this).next('.formDirections').slideDown();
    });

    //закрытие инпута
    $('.formDirections__bottom-close, .formDirections__close-red, .js-close-formDirections, .formDirections__close-abs').on('click', function () {
        $(this).closest('.formDirections').hide();
        $(this).closest('.formDirections').removeClass('d-ib');
    });

    //очистка города поездки
    function sumoselectCityClear(_sumoselectCity, _id){
        if (_sumoselectCity.hasClass('SumoUnder')) {
            _sumoselectCity[0].sumo.unload();
            _sumoselectCity.removeClass('SumoUnder');
        }

        $('#city_direction-'+_id).html('Не важно');
        $('#text-city-select-'+_id).html('Укажите страну');
        _sumoselectCity.html(' ');
        _sumoselectCity.hide();
    }

    //выбор страны поездки, установка флага и значения
    _sumoselectCountry.change(function (event) {
        if($('#step1Panel').is(":hidden"))
            return false;

        var _id = $(this).attr('data_id');
        var _text_select_city = $(this).find('option:selected').html();
        _sumoselectCity = $('#sumo-direction-city-'+_id);

        $('#country_direction-'+_id).html(_text_select_city);
        $(this).closest('.formDirections').hide();

        sumoselectCityClear(_sumoselectCity, _id);

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
            _sumoselectCity.SumoSelect({
                search: true,
                forceCustomRendering: true,
                searchText: 'Искать...',
                noMatch: 'Нет совпадений для "{0}"',
                searchFn: function (haystack, needle) {
                    return needle.length >= 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
                }
            });
            _sumoselectCity.parent().addClass('open');
            _sumoselectCity.next().next().css('top', '0').css('position', 'relative');
        })
    });

    //выбор города
    _sumoselectCity.change(function (event) {
        var _id = $(this).attr('data_id');
        $('#city_direction-'+_id).html($(this).find('option:selected').html());
        $(this).closest('.formDirections').hide();
    });

    //выбор города вылета
    _sumoselectDeparture.change(function (event) {
        var _id = $(this).attr('data_id');
        $('#direct_departure-'+_id).html($(this).find('option:selected').html());
        $(this).closest('.formDirections').hide();
    });

    //выбор города турангества
    _sumoselectCityTour.change(function (event) {
        var _id = $(this).attr('data_id');
        $('#city-tour').html($(this).find('option:selected').html());
        $('#city-tour-label').addClass('--center active');
        $(this).closest('.formDirections').hide();
        $('#sumo-list-city-3').val($(this).find('option:selected').val())
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
        _sumoselectCity = $('#sumo-direction-city-'+_id);
        $('.js-hide-dell-field-'+_id).hide();

        sumoselectCityClear(_sumoselectCity, _id);

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
        if ($('#optional').html() == '') {
            $(this).find('.bth__inp-lbl').removeClass('active');
            $(this).closest('.js-show-saggest').next().hide();
        }
    });

    $('#type1').on('change', function(){
        $('.js-types-search-hotel-blocks').hide();
        $('.js-types-search-tours-blocks').slideDown();
    });
    $('#type2').on('change', function(){
        $('.js-types-search-tours-blocks').hide();
        $('.js-types-search-hotel-blocks').slideDown();
    });
});