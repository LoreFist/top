$(document).ready(function () {
    //закрытие модального окна
    $('.js-modal-close, .agreement-pp__btn').on('click', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
    });

    //подчеркивание активной табы
    line = function (obj, pre_tab_selector, obj_line = $('.line')) {
        setTimeout(function () {//ждем попап
            var w = obj.width();
            var p = obj.position().left;
            obj_line.css({'left': p, 'width': w});
            $(pre_tab_selector).removeClass('active');
            obj.addClass('active');
        }, 0);
    };

    //переход по табам правовая информация в модальном окне
    $('#usage-role').click(function () {
        line($('#usage-role'), '#confidentiality', $('#legal_info_line'));
        $('#usage-role-panel').show();
        $('#confid-panel').hide();
    });

    $('#confidentiality').click(function () {
        line($('#confidentiality'), '#usage-role', $('#legal_info_line'));
        $('#usage-role-panel').hide();
        $('#confid-panel').show();
    });
});