<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile(
    '@web/js/help-extend.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>
<?php $form = ActiveForm::begin(['id' => 'form-extend',]);?>
<div class="panel" id="step1Panel" style="display: none">
    <div class="bth__cnt uppercase">Пожалуйста, укажите параметры вашей
        поездки
    </div>

    <div class="tour-selection-wrap">
        <div class="tour-selection-wrap-in tour-selection-wrap-flex">

            <?php echo $this->context->renderPartial(
                'partial/extend_datepicker',
                ['model' => $model, 'form' => $form]
            ); ?>
            <?php echo $this->context->renderPartial(
                'partial/extend_daystay', ['model' => $model, 'form' => $form]
            ); ?>
            <?php echo $this->context->renderPartial(
                'partial/extend_guests', ['model' => $model, 'form' => $form]
            ); ?>
            <?php echo $this->context->renderPartial(
                'partial/extend_price', ['model' => $model, 'form' => $form]
            ); ?>

        </div>

        <div class="tour-selection-wrap-in">

            <div class="rbt-block mt0 mb0 ">
                <input type="radio" name="types" class="rbt " id="type1"checked="">
                <label class=" js-type1 label-rbt" for="type1">
                    <span class="rbt-cnt uppercase">Турпакет</span>
                </label>
            </div>

            <div class="rbt-block   mt0 mb0">
                <input type="radio" name="types" class="rbt " id="type2">
                <label class="js-type2 label-rbt" for="type2">
                    <span class="rbt-cnt uppercase">Конкретный отель</span>
                </label>
            </div>
        </div>

        <div class=" js-types-search-tours-blocks">
            <div class="tour-selection-wrap-in tour-selection-wrap-flex">
                <?php $data_id = 0; ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_country',
                    ['model'              => $model, 'form' => $form,
                     'items_dict_country' => $items_dict['country'],
                     'data_id'            => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_city',
                    ['model' => $model, 'form' => $form, 'data_id' => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_departure',
                    ['model'            => $model, 'form' => $form,
                     'items_city_deprt' => $items_dict['city_deprt'],
                     'data_id'          => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial('partial/extend_hotel'); ?>

                <span class=" tour-selection-plus  hide-1023 js-add-field"
                      data_id=<?= $data_id ?>><i class="fas fa-plus"></i></span>
            </div>

            <?php $data_id= 1; //ид элемента, чтобы невозникло конфликто между элементами?>
            <div class="tour-selection-wrap-in tour-selection-wrap-flex js-show-added-field js-hide-dell-field-<?= $data_id ?>"
                 style="display: none">
                <?php echo $this->context->renderPartial(
                    'partial/extend_country',
                    ['model'              => $model, 'form' => $form,
                     'items_dict_country' => $items_dict['country'],
                     'data_id'            => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_city',
                    ['model' => $model, 'form' => $form, 'data_id' => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_departure',
                    ['model'            => $model, 'form' => $form,
                     'items_city_deprt' => $items_dict['city_deprt'],
                     'data_id'          => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial('partial/extend_hotel'); ?>
                <span class="tour-selection-plus js-del-field"
                      data_id=<?= $data_id ?>><i
                            class="fas fa-minus"></i></span>
            </div>

            <?php $data_id= 2; //ид элемента, чтобы невозникло конфликто между элементами?>
            <div class="tour-selection-wrap-in tour-selection-wrap-flex js-show-added-field js-hide-dell-field-<?= $data_id ?>"
                 style="display: none">
                <?php echo $this->context->renderPartial(
                    'partial/extend_country',
                    ['model'              => $model, 'form' => $form,
                     'items_dict_country' => $items_dict['country'],
                     'data_id'            => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_city',
                    ['model' => $model, 'form' => $form, 'data_id' => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_departure',
                    ['model'            => $model, 'form' => $form,
                     'items_city_deprt' => $items_dict['city_deprt'],
                     'data_id'          => $data_id]
                ); ?>
                <?php echo $this->context->renderPartial('partial/extend_hotel'); ?>
                <span class="tour-selection-plus js-del-field"
                      data_id=<?= $data_id ?>><i
                            class="fas fa-minus"></i></span>
            </div>
        </div>

        <div class=" js-types-search-hotel-blocks" style="display: none">
            <div class="tour-selection-wrap-in tour-selection-wrap-flex ">
                <div class="tour-selection-field tour-selection-field--250">
                    <div class="bth__inp-block js-show-formDirections">
                        <span class="bth__inp-lbl active">Город вылета</span>
                        <span class="bth__inp uppercase">без перелета</span>
                    </div>
                    <div class="formDirections w100p" style="display: none;">
                        <div class="formDirections__wrap w100p">
                            <div class="formDirections__top  formDirections__top-line">
                                <i class="formDirections__bottom-close"></i>
                                <div class="formDirections__top-tab super-grey ">Город вылета</div>
                            </div>
                            <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">
                                <div class="SumoSelect open" tabindex="0"><select class="sumo-department SumoUnder" tabindex="-1"><option value="-1">без перелета</option><option value="212">Москва</option><option value="294">Санкт-Петербург</option><option value="6850">Алматы</option><option value="6849">Астана</option><option value="34">Белгород</option><option value="57">Брянск</option><option value="78">Владикавказ</option><option value="80">Волгоград</option><option value="84">Воронеж</option><option value="420">Гомель</option><option value="421">Гродно</option><option value="109">Екатеринбург</option><option value="132">Иркутск</option><option value="141">Калининград</option><option value="429">Киев</option><option value="175">Краснодар</option><option value="176">Красноярск</option><option value="195">Магадан</option><option value="199">Махачкала</option><option value="204">Минеральные Воды</option><option value="215">Мурманск</option><option value="218">Набережные Челны</option><option value="217">Нижний Новгород</option><option value="236">Новосибирск</option><option value="249">Омск</option><option value="251">Оренбург</option><option value="260">Пенза</option><option value="286">Ростов-на-Дону</option><option value="296">Саратов</option><option value="314">Симферополь</option><option value="318">Смоленск</option><option value="323">Сочи</option><option value="354">Томск</option><option value="367">Ульяновск</option><option value="382">Харьков</option><option value="388">Челябинск</option><option value="7253">Шымкент</option><option value="415">Якутск</option><option value="417">Ярославль</option></select><p class="CaptionCont SelectBox search" title="Выберите"><span class="placeholder">Выберите</span><label><i></i></label><input type="text" class="search-txt" value="" placeholder="Искать..."><input type="text" class="search-txt" value="" placeholder="Искать..."></p><div class="optWrapper" style="top: 0px; position: relative;"><ul class="options"><li class="opt selected" data-val="undefined"><label>без перелета</label></li><li class="opt" data-val="undefined"><label>Москва</label></li><li class="opt" data-val="undefined"><label>Санкт-Петербург</label></li><li class="opt" data-val="undefined"><label>Алматы</label></li><li class="opt" data-val="undefined"><label>Астана</label></li><li class="opt" data-val="undefined"><label>Белгород</label></li><li class="opt" data-val="undefined"><label>Брянск</label></li><li class="opt" data-val="undefined"><label>Владикавказ</label></li><li class="opt" data-val="undefined"><label>Волгоград</label></li><li class="opt" data-val="undefined"><label>Воронеж</label></li><li class="opt" data-val="undefined"><label>Гомель</label></li><li class="opt" data-val="undefined"><label>Гродно</label></li><li class="opt" data-val="undefined"><label>Екатеринбург</label></li><li class="opt" data-val="undefined"><label>Иркутск</label></li><li class="opt" data-val="undefined"><label>Калининград</label></li><li class="opt" data-val="undefined"><label>Киев</label></li><li class="opt" data-val="undefined"><label>Краснодар</label></li><li class="opt" data-val="undefined"><label>Красноярск</label></li><li class="opt" data-val="undefined"><label>Магадан</label></li><li class="opt" data-val="undefined"><label>Махачкала</label></li><li class="opt" data-val="undefined"><label>Минеральные Воды</label></li><li class="opt" data-val="undefined"><label>Мурманск</label></li><li class="opt" data-val="undefined"><label>Набережные Челны</label></li><li class="opt" data-val="undefined"><label>Нижний Новгород</label></li><li class="opt" data-val="undefined"><label>Новосибирск</label></li><li class="opt" data-val="undefined"><label>Омск</label></li><li class="opt" data-val="undefined"><label>Оренбург</label></li><li class="opt" data-val="undefined"><label>Пенза</label></li><li class="opt" data-val="undefined"><label>Ростов-на-Дону</label></li><li class="opt" data-val="undefined"><label>Саратов</label></li><li class="opt" data-val="undefined"><label>Симферополь</label></li><li class="opt" data-val="undefined"><label>Смоленск</label></li><li class="opt" data-val="undefined"><label>Сочи</label></li><li class="opt" data-val="undefined"><label>Томск</label></li><li class="opt" data-val="undefined"><label>Ульяновск</label></li><li class="opt" data-val="undefined"><label>Харьков</label></li><li class="opt" data-val="undefined"><label>Челябинск</label></li><li class="opt" data-val="undefined"><label>Шымкент</label></li><li class="opt" data-val="undefined"><label>Якутск</label></li><li class="opt" data-val="undefined"><label>Ярославль</label></li></ul><p class="no-match"></p><p class="no-match"></p></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tour-selection-field tour-selection-field--250">
                    <div class="bth__inp-block bth__inp-block--meal js-show-formDirections">
                        <span class="bth__inp-lbl active">Питание</span>
                        <span class="bth__inp">ЛЮБОЕ</span>
                    </div>
                    <div class="formDirections" style="display: none;">
                        <div class="formDirections__top  formDirections__top-line">
                            <i class="formDirections__bottom-close"></i>
                            <div class="formDirections__top-tab super-grey">
                                Питание
                            </div>
                        </div>
                        <div class="formDirections__wrap">
                            <div class="formDirections__bottom ">
                                <div class="formDirections__bottom-blocks">
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16 ">
                                            <input name="meal[]" value="any" type="checkbox" class="cbx" id="8eat2-type0">
                                            <label class="label-cbx" for="8eat2-type0">
                                                <span class="cbx-cnt">ЛЮБОЕ</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16 ">
                                            <input name="meal[]" value="AI" type="checkbox" class="cbx" id="8eat2-type1">
                                            <label class="label-cbx" for="8eat2-type1">
                                                <span class="cbx-cnt">AI Все включено</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16">
                                            <input name="meal[]" value="FB" type="checkbox" class="cbx" id="8eat2-type2">
                                            <label class="label-cbx" for="8eat2-type2">
                                                <span class="cbx-cnt">FB  Завтрак + обед + ужин</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16 ">
                                            <input name="meal[]" value="HB" type="checkbox" class="cbx" id="8eat2-type3">
                                            <label class="label-cbx" for="8eat2-type3">
                                                <span class="cbx-cnt">HB  Завтрак +  ужин</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16 ">
                                            <input name="meal[]" value="BB" type="checkbox" class="cbx" id="8eat2-type4">
                                            <label class="label-cbx" for="8eat2-type4">
                                                <span class="cbx-cnt"> BB Завтрак</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block   cbx-block--16  ">
                                            <input name="meal[]" value="RO" type="checkbox" class="cbx" id="8eat2-type5">
                                            <label class="label-cbx" for="8eat2-type5">
                                                <span class="cbx-cnt">RO Без питания</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="formDirections__static-btn js-close-formDirections">Применить
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tour-selection-wrap">
                <div data-tour-row="0" class="tour-selection-wrap-in tour-selection-wrap-flex ">
                    <div class="tour-selection-field tour-selection-field--740">
                        <div class="bth__inp-block js-show-formDirections js-formDirections--big-mobile">
                            <span class="bth__inp-lbl ">Добавить отель</span>
                            <span class="bth__inp">
                                        <span class="hotel-search">
                                            <span class="hotel-search__cut"></span>
                                            <span class="hotel-search__rating"></span>
                                            <span class="hotel-search__place"></span>
                                        </span>
                                    </span>
                        </div>
                        <div class="formDirections formDirections--big-mobile w100p" style="display: none;">
                            <div class="formDirections__wrap w100p">
                                <div class="formDirections__top formDirections__top--white">

                                    <i class="formDirections__bottom-close"></i>
                                    <div class="formDirections__top-tab super-grey">
                                        Добавить отель
                                    </div>
                                </div>
                                <div class="formDirections__bottom">
                                    <div class="formDirections__search">
                                        <input class="bth__inp" type="text" placeholder="Поиск отеля">
                                    </div>
                                    <div class="formDirections__wrap  formDirections__bottom-blocks-cut">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="tour-selection-plus hide-1023 js-add-hotel"><i class="fas fa-plus"></i></span>
                </div>
                <div data-tour-row="1" class="tour-selection-wrap-in tour-selection-wrap-flex tour-selection-wrap-in--hidden" style="display:none;">
                    <div class="tour-selection-field tour-selection-field--740">
                        <div class="bth__inp-block js-show-formDirections js-formDirections--big-mobile">
                            <span class="bth__inp-lbl ">Добавить отель</span>
                            <span class="bth__inp">
                                        <span class="hotel-search">
                                            <span class="hotel-search__cut"></span>
                                            <span class="hotel-search__rating"></span>
                                            <span class="hotel-search__place"></span>
                                        </span>
                                    </span>
                        </div>
                        <div class="formDirections formDirections--big-mobile w100p" style="display: none;">
                            <div class="formDirections__wrap w100p">
                                <div class="formDirections__top formDirections__top--white">

                                    <i class="formDirections__bottom-close"></i>
                                    <div class="formDirections__top-tab super-grey">
                                        Добавить отель
                                    </div>
                                </div>
                                <div class="formDirections__bottom">
                                    <div class="formDirections__search">
                                        <input class="bth__inp" type="text" placeholder="Поиск отеля">
                                    </div>
                                    <div class="formDirections__wrap  formDirections__bottom-blocks-cut">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class=" tour-selection-plus js-del-hotel"><i class="fas fa-minus"></i></span>
                </div>
                <div data-tour-row="2" class="tour-selection-wrap-in tour-selection-wrap-flex tour-selection-wrap-in--hidden" style="display:none;">
                    <div class="tour-selection-field tour-selection-field--740">
                        <div class="bth__inp-block js-show-formDirections js-formDirections--big-mobile">
                            <span class="bth__inp-lbl ">Добавить отель</span>
                            <span class="bth__inp">
                                        <span class="hotel-search">
                                            <span class="hotel-search__cut"></span>
                                            <span class="hotel-search__rating"></span>
                                            <span class="hotel-search__place"></span>
                                        </span>
                                    </span>
                        </div>
                        <div class="formDirections formDirections--big-mobile w100p" style="display: none;">
                            <div class="formDirections__wrap w100p">
                                <div class="formDirections__top formDirections__top--white">

                                    <i class="formDirections__bottom-close"></i>
                                    <div class="formDirections__top-tab super-grey">
                                        Добавить отель
                                    </div>
                                </div>

                                <div class="formDirections__bottom">
                                    <div class="formDirections__search">
                                        <input class="bth__inp" type="text" placeholder="Поиск отеля">
                                    </div>
                                    <div class="formDirections__wrap  formDirections__bottom-blocks-cut">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class=" tour-selection-plus js-del-hotel"><i class="fas fa-minus"></i></span>
                </div>
            </div>
        </div>

        <div class="tour-selection-wrap-in">
            <div class="bth__ta-resizable-wrap optional-js-field">
                <div class="bth__ta-resizable" contenteditable="" id="optional"></div>
                <?= $form->field($model, 'optional')->hiddenInput()->label(
                    false
                ); ?>
                <span class="bth__ta-resizable-hint bth__inp-lbl">Дополнительные пожелания</span>

            </div>
        </div>

        <div class="tour-selection-wrap-in">
            <div class="bth__btn  bth__btn--fill bth__loader"
                 id="extend_submit">
                Сформировать заявку
                <div class=" bth__loader-spin">
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel" id="step2Panel" style="display: none">

    <div class="tour-selection-wrap">

        <div class="tour-selection-wrap-in mt0 tour-selection-wrap-flex">

            <div class="tour-selection-field tour-selection-field--270">
                <?= $form->field(
                    $model, 'name',
                    [
                        'template'             =>
                            '                                                       
                                                        {input}
                                                        {label}
                                                        <div class="hint-block hint-block--abs">
                                                            <i class="fa fa-question-circle question-error"
                                                               aria-hidden="true"></i>
                                                            <div class="hint">
                                                                <p class="bth__cnt">Поле не должно быть пустым</p>
                                                            </div>
                                                        </div>   
                                                ',
                        'enableAjaxValidation' => true,
                        'validateOnType'       => true,
                        'validationDelay'      => 1,
                        'labelOptions' => ['class' => 'bth__inp-lbl '],
                        'options'      => ['class' => 'js-add-error bth__inp-block'],
                    ]
                )
                    ->textInput(
                        ['class' => 'bth__inp js-label', 'id' => 'name3',]
                    )
                    ->label();
                ?>
            </div>

            <div class="tour-selection-field tour-selection-field--270">
                <?= $form->field(
                    $model, 'phone',
                    [
                        'template'             =>
                            '                                                       
                                                        {input}
                                                        {label}
                                                        <div class="hint-block hint-block--abs">
                                                            <i class="fa fa-question-circle question-error"
                                                               aria-hidden="true"></i>
                                                            <div class="hint">
                                                                <p class="bth__cnt">Поле не должно быть пустым</p>
                                                            </div>
                                                        </div>   
                                                ',
                        'enableAjaxValidation' => true,
                        'validateOnType'       => true,
                        'validationDelay'      => 1,
                        'labelOptions' => ['class' => 'bth__inp-lbl '],
                        'options'      => ['class' => 'js-add-error bth__inp-block'],
                    ]
                )
                    ->textInput(
                        ['class' => 'bth__inp js-label', 'id' => 'phone1',]
                    )
                    ->label();
                ?>
            </div>

            <div class="tour-selection-field tour-selection-field--270">
                <?= $form
                    ->field($model, 'email',
                        [
                            'template' => '
                                            {input} 
                                            {label}
                                            <div class="hint-block hint-block--abs">
                                                <i class="fa fa-question-circle question-error"
                                                   aria-hidden="true"></i>
                                                <div class="hint">
                                                    <p class="bth__cnt">Емайл должен быть формата ххххх@xxxx.xxxx</p>
                                                </div>
                                            </div>
                                        ',
                            'enableAjaxValidation' => true,
                            'validateOnType'       => true,
                            'validationDelay'      => 1,
                            'labelOptions' => ['class' => 'bth__inp-lbl '],
                            'options'      => ['class' => 'js-add-error bth__inp-block'],
                        ]
                    )
                    ->textInput(['class' => 'bth__inp js-label', 'id' => 'mail3',])
                    ->label();
                ?>
            </div>

        </div>
        <div class="bth__cnt uppercase mt20 ">Уточните удобные координаты для
            выбора турагенства
        </div>
        <div class="tour-selection-wrap-in   tour-selection-wrap-flex ">
            <div class="tour-selection-field tour-selection-field--270 ">
                <?php $data_id = 3;?>
                <?= $form->field($model, 'city_tour_id',
                    [
                        'template'             =>
                         '          
                            <div class="bth__inp-block js-show-formDirections">
                                <span class="bth__inp-lbl" id="city-tour-label">Ваш город</span>
                                <span class="bth__inp"> <b class="uppercase" id="city-tour"></b></span>
                                <div class="hint-block hint-block--abs">
                                    <i class="fa fa-question-circle question-error"aria-hidden="true"></i>
                                    <div class="hint">
                                        <p class="bth__cnt">Поле не должно быть пустым</p>
                                    </div>
                                </div> 
                            </div>  
                            <div class="formDirections w100p" style="display: none;">
                                <div class="formDirections__wrap w100p">
                                    <div class="formDirections__top  formDirections__top-line">
                                        <i class="formDirections__bottom-close"></i>
                                        <div class="formDirections__top-tab super-grey "> Города </div>
                                    </div> 
                                    <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">                                          
                                        {input}
                                    </div>
                                </div>
                            </div>
                         ',
                        'labelOptions' => ['class' => 'bth__inp-lbl '],
                        'options'      => ['class' => 'js-add-error bth__inp-block'],
                    ])
                    ->dropDownList(
                        $items_dict['city_deprt'],
                        [
                            'id'      => "sumo-list-city-".$data_id,
                            'class'   => "sumo-list-city",
                            'data_id' => $data_id,
                        ]
                    )
                    ->label(false);
                ?>
            </div>
        </div>
        <div class="tour-selection-wrap-in">
            <a href="#" class="metro-valid-pp bth__btn  bth__btn--fill bth__loader" id='extend_step_submit'>
                Отправить запрос*
                <div class=" bth__loader-spin">
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                </div>
            </a>

            <div class="tour-selection-wrap__abs-txt  bth__cnt bth__cnt--sm">
                *Нажимая на кнопку "отправить", я принимаю
                <a href="#p-agreement-pp" class="p-agreement-pp agree">
                    Соглашение об обработке личных данных</a> и
                <a href="#p-agreement-pp" class="p-agreement-pp site-role">Правила
                    сайта</a>
            </div>

        </div>

    </div>
</div>
<?= $form->field($model, 'created_at',['enableAjaxValidation' => false])->hiddenInput(['id'=>'create_at'])->label(false)->error(false) ?>
<?php ActiveForm::end(); ?>​