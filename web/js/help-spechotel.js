$(document).ready(function () {

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