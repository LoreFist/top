$(document).ready(function () {
    var _countSpecHotel = 3; //количество отелей в конкретном отеле
    var _sumoselect_dep_spechotel = $('.sumo-departure-spechotel'); //селект поиска города вылета в конкретном отеле

    //формирование отображение города вылета в конкрнетном отеле
    _sumoselect_dep_spechotel.SumoSelect({
        search: true,
        forceCustomRendering: true,
        searchText: 'Искать...',
        noMatch: 'Нет совпадений для "{0}"',
        searchFn: function (haystack, needle) {
            return needle.length > 3 && haystack.toLowerCase().indexOf(needle.toLowerCase()) < 0;
        }

    });
    _sumoselect_dep_spechotel.parent().addClass('open');
    _sumoselect_dep_spechotel.next().next().css('top', '0').css('position', 'relative');

    //выбор города вылета в форме конкретный отель
    _sumoselect_dep_spechotel.change(function (event) {
        var _id = $(this).attr('data_id');
        $('#departure_spechotel').html($(this).find('option:selected').html());
        $(this).closest('.formDirections').hide();
    });

    //добавление/удаление плюса/минуса отеля в форме  конкретный отель
    $('.js-add-spechotel').on('click', function () {
        $('.js-show-added-spechotel').each(function () {
            if ($(this).is(":hidden")) {
                $(this).show();
                return false;
            }
        });
    });
    $('.js-del-spechotel').on('click', function () {
        var _id = $(this).attr('data_id');
        $('.js-hide-dell-spechotel-'+_id).hide();
        return false;
    });

    var _val_food = [];
    $(document).on('change', '.cbx', function() {
        var _val = $(this).val()+' ';

        if(this.checked) {
            if(_val == 'ALL '){
                $(this).closest('.formDirections').hide();
                _val_food = [];
                $('input.cbx').prop( "checked", false );
                $('input#type-foodALL.cbx').prop( "checked", true );
                $('#label_food').html('ЛЮБОЕ');
                return false;
            } else{
                $('input#type-foodALL.cbx').prop( "checked", false );

                if(_val_food.indexOf('ЛЮБОЕ') == 1)
                    _val_food.splice(_val_food.indexOf('ЛЮБОЕ'), 1);

                _val_food.push(_val);
            }
        } else {
            _val_food.splice(_val_food.indexOf(_val), 1);
        }

        if(_val_food.length == 0 || _val_food.length == 5) {
            $(this).closest('.formDirections').hide();
            _val_food = [];
            $('input.cbx').prop( "checked", false );
            $('input#type-foodALL.cbx').prop( "checked", true );
            $('#label_food').html('ЛЮБОЕ');
            return false;
        }

        $('#label_food').html(_val_food);
    });
});
