$(document).ready(function () {
    var _countTourPach = 3; //количество направлений в турпакете
    var _sumoselectCountry = $('.sumo-direction-country'); //селект поиска страны в турпакете
    var _sumoselectDeparture = $('.sumo-departure'); //селект поиска город вылета в турпакете
    var _sumoselectCity = $('.sumo-direction-city'); //селект поиска города в турпакете
    var _sumoselectCityTour = $('.sumo-list-city'); //селект поиска города в турпакете
    var _modelRequestId = 0;
    var _data_id = 0; //номер направления

    $('.set-checked').prop( "checked", true ); //устанавлиавем в параметры отеля дефолтный радиобатон

    function setLabelParamHotel(id) {
        var _countParamHotel = $('input[name*="Request[direct]['+id+']"]input[type!="hidden"]').length;
        var _countCheckedParamHotel = $('input[name*="Request[direct]['+id+']"]input[type!="hidden"]input:checked').length;
        $('.param-hotel-'+id).html(_countCheckedParamHotel+' / '+_countParamHotel+' параметров');
        $('.param-hotel-lbl-'+id).addClass('active');
    }

    for (var i=0; i<=_countTourPach; i++) //устаналиваем дефолтное значение Лэйбла параметров отеля
        setLabelParamHotel(i);

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
                        $('#step1_wrap').hide();
                        $('#step2_wrap').slideDown();
                    }
                    else {
                        $('#step1Panel').html($('#thx').html());
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
        _data_id = $(this).parent().attr('data-id');
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
        $('#optional').addClass('focus');
        $(this).closest('.js-show-saggest').next().show();
    });

    //возвращает плейсхолдер
    $('.optional-js-field').on('focusout', function () {
        if ($('#optional').html() == '') {
            $(this).find('.bth__inp-lbl').removeClass('active');
            $(this).closest('.js-show-saggest').next().hide();
            $('#optional').removeClass('focus');
        }
    });

    //радио батон турпакет или конкретный отель
    $('#type1').on('change', function(){
        $('.js-types-search-hotel-blocks').hide();
        $('.js-types-search-tours-blocks').slideDown();
    });
    $('#type2').on('change', function(){
        $('.js-types-search-tours-blocks').hide();
        $('.js-types-search-hotel-blocks').slideDown();
    });

    //упарвление контролом параметры отеля
    $('.formDirections__top-tab').on('click', function(){
        $('.formDirections__top-tab').removeClass('active');
        $('.formDirections__bottom_ph'+_data_id).hide();

        $(this).addClass('active');

        var _bottom = '.'+$(this).attr("class").split(/\s+/)[1];
        $('.form-change'+_data_id).find(_bottom).show();
    });


    function checkboxFood(classCheckbox, idCheckbox, labelCheckbox, valueFood, flagClose){
        $(document).on('change', '.'+classCheckbox, function() {
            var _val = $(this).val()+' ';

            if(this.checked) {
                if(_val == 'ALL '){
                    if(flagClose)
                        $(this).closest('.formDirections').hide();
                    valueFood = [];
                    $('input.'+classCheckbox).prop( "checked", false );
                    $('input#'+idCheckbox+'ALL.cbx').prop( "checked", true );
                    $('#'+labelCheckbox).html('ЛЮБОЕ');
                    return valueFood;
                } else{
                    $('input#'+idCheckbox+'ALL.'+classCheckbox).prop( "checked", false );

                    if(valueFood.indexOf('ЛЮБОЕ') == 1)
                        valueFood.splice(valueFood.indexOf('ЛЮБОЕ'), 1);

                    valueFood.push(_val);
                }
            } else {
                valueFood.splice(valueFood.indexOf(_val), 1);
            }

            if(valueFood.length == 0 || valueFood.length == 5) {
                if(flagClose)
                    $(this).closest('.formDirections').hide();
                valueFood = [];
                $('input.'+classCheckbox).prop( "checked", false );
                $('input#'+idCheckbox+'ALL.'+classCheckbox).prop( "checked", true );
                $('#'+labelCheckbox).html('ЛЮБОЕ');
                return false;
            }

            $('#'+labelCheckbox).html(valueFood);

            return valueFood
        });
    }

    $(document).on('change', '.checkbox-stars', function() {//логика чекбоксов в параметрах отеля Категории
        var _val = $(this).val();
        if(this.checked) {
            if(_val == 'any' || _val == 66) { //значение чекбоксов Любая Категория и Без Категории
                $('input[name*="Request[direct]['+_data_id+']"].checkbox-stars').prop( "checked", false );
                $('input[name*="Request[direct]['+_data_id+']"]#type-category0.cbx').prop( "checked", true );
                $('input[name*="Request[direct]['+_data_id+']"]#type-category66.cbx').prop( "checked", true );
            }
            else{
                $('input[name*="Request[direct]['+_data_id+']"]#type-category0.cbx').prop( "checked", false );
                $('input[name*="Request[direct]['+_data_id+']"]#type-category66.cbx').prop( "checked", false );
            }
        }
    });

    $(document).on('change', '.palace-type', function() {//логика чекбоксов в параметрах отеля Расположение
        var _val = $(this).val();
        if(this.checked) {
            if(_val == 'any'){
                $('input.palace-type').prop( "checked", false );
                $('input#palace_type_0.cbx').prop( "checked", true );
            } else if(_val >=1 && _val <=13){
                $('input#palace_type_0.cbx').prop( "checked", false );

                if(_val >=1 && _val<=4){
                    for(var i=5; i<=13; i++)
                        $('input#palace_type_'+i+'.cbx').prop( "checked", false );
                }

                if(_val >=11 && _val<=13){
                    for(var i=1; i<=10; i++)
                        $('input#palace_type_'+i+'.cbx').prop( "checked", false );
                }

                if(_val >=8 && _val<=10){
                    for(var i=1; i<=7; i++)
                        $('input#palace_type_'+i+'.cbx').prop( "checked", false );

                    for(var i=11; i<=13; i++)
                        $('input#palace_type_'+i+'.cbx').prop( "checked", false );
                }

                if(_val >=5 && _val<=7){
                    for(var i=1; i<=4; i++)
                        $('input#palace_type_'+i+'.cbx').prop( "checked", false );

                    for(var i=8; i<=13; i++)
                        $('input#palace_type_'+i+'.cbx').prop( "checked", false );
                }
            }

        }
    });

    var _val_food = [];
    _val_food = checkboxFood('food-spechotel','type-food','label_food',_val_food, true); //логика чекбоксов в конткретном отеле еда

    var _val_food_param_hotel = [];
    _val_food_param_hotel = checkboxFood('param-hotel','type-food-param-hotel','',_val_food_param_hotel,false); //логика чекбоксов в параметрах отеле еда

    $('.submit-hotel-params').on('click', function(){
        $(this).closest('.formDirections').hide();
        var _id = $(this).attr('data-id');
        setLabelParamHotel(_id);
    });
});