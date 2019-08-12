$(document).ready(function () {

    //переходы по табам нестандартного запроса
    $('#step1').click(function () {
        line($(this), '.tab');
        $('#step1Panel').show();
        $('#formPanel').hide();
    });
    $('#form').click(function () {
        line($(this), '.tab');
        $('#step1Panel').hide();
        $('#formPanel').show();
    });

    //переход по табам соглашения пользователя в модальном окне
    $('#agreement, .agree').click(function () {
        line($('#agreement'), '#siteRole', $('#agreement_line'));
        $('#agreementPanel').show();
        $('#siteRolePanel').hide();
    });
    $('#siteRole, .site-role').click(function () {
        line($('#siteRole'), '#agreement', $('#agreement_line'));
        $('#agreementPanel').hide();
        $('#siteRolePanel').show();
    });

    //условия проверки полей нестандартного запроса
    function validation(obj) {
        var valid = [];

        if ($('#name1').val() == '') { //имя не пустое
            $('#name1').parent('.js-add-error').addClass('has-error');
            valid['name'] = false;
        } else {
            $('#name1').parent('.js-add-error').removeClass('has-error');
            valid['name'] = true;
        }

        if ($('#phone1').val() == '') { //телефон не пустой
            $('#phone1').parent('.js-add-error').addClass('has-error');
            valid['phone'] = false;
        } else {
            $('#phone1').parent('.js-add-error').removeClass('has-error');
            valid['phone'] = true;
        }

        valid['mail'] = true;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test($('#mail3').val()) && $('#mail3').val() != '') { //если вели емайл, проверяет формата ххх@xxx.xx
            $('#mail3').parent('.js-add-error').addClass('has-error');
            valid['mail'] = false;
        } else {
            $('#mail3').parent('.js-add-error').removeClass('has-error');
            valid['mail'] = true;
        }

        return valid;
    }

    $('.js-label').keyup(function () {
        validation($(this));
    });

    //отправка нестандартной формы
    $('#nonstandard_submit').on('click', function () {
        var valid = validation($(this));
        var date = new Date();
        $('#create_at').val(date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()+' '+date.getHours()+':'+date.getMinutes()+':'+date.getSeconds());

        if (valid['name'] == true && valid['phone'] == true && valid['mail'] == true) {
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

