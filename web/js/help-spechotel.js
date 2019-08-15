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
});