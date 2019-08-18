$(document).ready(function () {
    //переходы по табам нестандартного запроса
    $('#step1').click(function () {
        line($(this), '.tab');

        if(!$('#step2Panel').is(":visible"))
            $('#step1Panel').slideDown();
        else
            $('#step1Panel').show();

        $('#step2Panel').hide();
        $('#formPanel').hide();
        saveActiveTab(('#step1'));
    });
    $('#form').click(function () {
        line($(this), '.tab');
        $('#step1Panel').hide();
        $('#step2Panel').hide();
        $('#formPanel').slideDown();

        saveActiveTab(('#form'));
    });

    function saveActiveTab(_tab){
        if (history.pushState)
            history.pushState(null, null, _tab);
        else
            location.hash = _tab;
    }

    if (window.location.hash)
        $(window.location.hash).click();

    //переход по табам соглашения пользователя в модальном окне
    $('#agreement, .agree').click(function () {
        line($('#agreement'), '#siteRole', $('#agreement_line'));
        $('#agreementPanel').slideDown();
        $('#siteRolePanel').hide();
    });
    $('#siteRole, .site-role').click(function () {
        line($('#siteRole'), '#agreement', $('#agreement_line'));
        $('#agreementPanel').hide();
        $('#siteRolePanel').slideDown();
    });

    //отправка нестандартной формы
    $('#nonstandard_submit').on('click', function () {
        var valid = 0;
        var date = new Date();
        $('#create_at_n').val(date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()+' '+date.getHours()+':'+date.getMinutes()+':'+date.getSeconds());

        var $form = $('#form-nostadndatd');
        var data = $form.data("yiiActiveForm");

        $.each(data.attributes, function (e) {
            this.status = 3;
        });
        $form.yiiActiveForm("validate");

        var _valid = $form.find('.has-error').length;

        if(_valid == 0){
            $(this).addClass('bth__loader--animate'); //анимация трех точек для кнопки
            $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/savenostandard',
                    data: $('#form-nostadndatd').serializeArray()
                }
            )
            .done(function (data) {
                if (data['code'] == 1) {
                    $('#formPanel').html($('#thx').html());
                }
            })

        }
    });

    //убирает плейсхолдер
    $('.bth__inp.js-stop-label').on('focus', function () {
        $(this).addClass('focus');
        $(this).next('.bth__inp-lbl').hide();
    });

    //возвращает плейсхолдер
    $('.bth__inp.js-stop-label').on('blur', function () {
        if ($(this).val().trim() !== '') {
            $(this).next('.bth__inp-lbl').hide();
        } else {
            $(this).next('.bth__inp-lbl').show();
        }
    });

    //сдвигает плейсхолдер
    $('.js-label').on('focus', function () {
        $(this).next('.bth__inp-lbl').addClass('active');
        $(this).closest('.js-show-saggest').next().show();
    });

    //возвращает плейсхолдер
    $('.js-label').on('blur', function () {
        if ($(this).val().trim() === '') {
            $(this).next('.bth__inp-lbl').removeClass('active');
            $(this).closest('.js-show-saggest').next().hide();
        }
    });

    $('.js-label').on('change', function () {
        $('.js-label').each(function () {
            if ($(this).val().length) {
                $(this).next('.bth__inp-lbl').addClass('active');
            }
        });
    });

    $('.bth__inp-block.long textarea').on('focus', function () {
        $(this).closest('.bth__inp-block.long').addClass('active');
    });
    $('.bth__inp-block.long textarea').on('blur', function () {
        $(this).closest('.bth__inp-block.long').removeClass('active');
    });
});

