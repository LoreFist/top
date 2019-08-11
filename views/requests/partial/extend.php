<?php
/* @var $this yii\web\View */


use yii\widgets\ActiveForm;

$this->registerJsFile(
    '@web/js/help-extend.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>

<div class="panel" id="step1Panel" style="">
    <div class="bth__cnt uppercase">Пожалуйста, укажите параметры вашей поездки</div>

    <?php $form = ActiveForm::begin(['id' => 'form-extend']); ?>
        <div class="tour-selection-wrap">
        <div class="tour-selection-wrap-in tour-selection-wrap-flex">

                <?php echo $this->context->renderPartial('partial/extend_datepicker', ['model'=>$model, 'form'=>$form]); ?>
                <?php echo $this->context->renderPartial('partial/extend_daystay', ['model'=>$model, 'form'=>$form]); ?>
                <?php echo $this->context->renderPartial('partial/extend_guests', ['model'=>$model, 'form'=>$form]); ?>
                <?php echo $this->context->renderPartial('partial/extend_price', ['model'=>$model, 'form'=>$form]); ?>

        </div>

        <div class="tour-selection-wrap-in">

            <div class="rbt-block mt0 mb0 ">
                <input type="radio" name="types" class="rbt " id="type1" checked="">
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


                <?php echo $this->context->renderPartial('partial/extend_country'); ?>
<!--                --><?php //echo $this->context->renderPartial('partial/extend__'); ?>

                <span class=" tour-selection-plus  hide-1023 js-add-field">
                            <i class="fas fa-plus"></i>
                        </span>
            </div>

            <div class="tour-selection-wrap-in tour-selection-wrap-flex js-show-added-field" style="display: none">
                <div class="tour-selection-field tour-selection-field--250 ">
                    <div class="bth__inp-block">
                        <span class="bth__inp-lbl ">Страна поездки</span>
                        <div class="bth__inp tour-selection__country  js-show-formDirections">
                        </div>


                        <div class="formDirections w100p" style="display: none;">
                            <div class="formDirections__wrap w100p">

                                <div class="formDirections__top  formDirections__top-line">

                                    <i class="formDirections__bottom-close"></i>
                                    <div class="formDirections__top-tab super-grey ">Страна поездки</div>
                                </div>

                                <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">

                                    <div class="SumoSelect open" tabindex="0"><select id="sumo-direction" class="SumoUnder" tabindex="-1">


                                            <option value="Россия">Россия</option>
                                            <option value="Украина">Украина</option>
                                            <option value="Беларуссия">Беларуссия</option>
                                            <option value="Казахстан">Казахстан</option>
                                            <option value="Доминикана">Доминикана</option>
                                            <option value="Турция">Турция</option>
                                            <option value="Египет">Египет</option>

                                            <option value="Россия">Россия</option>
                                            <option value="Украина">Украина</option>
                                            <option value="Беларуссия">Беларуссия</option>
                                            <option value="Казахстан">Казахстан</option>
                                            <option value="Доминикана">Доминикана</option>
                                            <option value="Турция">Турция</option>
                                            <option value="Египет">Египет</option>

                                            <option value="Россия">Россия</option>
                                            <option value="Украина">Украина</option>
                                            <option value="Беларуссия">Беларуссия</option>
                                            <option value="Казахстан">Казахстан</option>
                                            <option value="Доминикана">Доминикана</option>
                                            <option value="Турция">Турция</option>
                                            <option value="Египет">Египет</option>

                                            <option value="Россия">Россия</option>
                                            <option value="Украина">Украина</option>
                                            <option value="Беларуссия">Беларуссия</option>
                                            <option value="Казахстан">Казахстан</option>
                                            <option value="Доминикана">Доминикана</option>
                                            <option value="Турция">Турция</option>
                                            <option value="Египет">Египет</option>


                                        </select><p class="CaptionCont SelectBox search" title=" Россия"><span> Россия</span><label><i></i></label><input type="text" class="search-txt" value="" placeholder="Искать..."></p><div class="optWrapper" style="top: 0px; position: relative;"><ul class="options"><li class="opt selected" data-val="undefined"><label>Россия</label></li><li class="opt" data-val="undefined"><label>Украина</label></li><li class="opt" data-val="undefined"><label>Беларуссия</label></li><li class="opt" data-val="undefined"><label>Казахстан</label></li><li class="opt" data-val="undefined"><label>Доминикана</label></li><li class="opt" data-val="undefined"><label>Турция</label></li><li class="opt" data-val="undefined"><label>Египет</label></li><li class="opt" data-val="undefined"><label>Россия</label></li><li class="opt" data-val="undefined"><label>Украина</label></li><li class="opt" data-val="undefined"><label>Беларуссия</label></li><li class="opt" data-val="undefined"><label>Казахстан</label></li><li class="opt" data-val="undefined"><label>Доминикана</label></li><li class="opt" data-val="undefined"><label>Турция</label></li><li class="opt" data-val="undefined"><label>Египет</label></li><li class="opt" data-val="undefined"><label>Россия</label></li><li class="opt" data-val="undefined"><label>Украина</label></li><li class="opt" data-val="undefined"><label>Беларуссия</label></li><li class="opt" data-val="undefined"><label>Казахстан</label></li><li class="opt" data-val="undefined"><label>Доминикана</label></li><li class="opt" data-val="undefined"><label>Турция</label></li><li class="opt" data-val="undefined"><label>Египет</label></li><li class="opt" data-val="undefined"><label>Россия</label></li><li class="opt" data-val="undefined"><label>Украина</label></li><li class="opt" data-val="undefined"><label>Беларуссия</label></li><li class="opt" data-val="undefined"><label>Казахстан</label></li><li class="opt" data-val="undefined"><label>Доминикана</label></li><li class="opt" data-val="undefined"><label>Турция</label></li><li class="opt" data-val="undefined"><label>Египет</label></li></ul><p class="no-match"></p></div></div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tour-selection-field tour-selection-field--180">
                    <div class="bth__inp-block js-show-formDirections">

                        <span class="bth__inp-lbl ">Города</span>
                        <span class="bth__inp  uppercase "></span>
                    </div>


                    <div class="formDirections w100p" style="">
                        <div class="formDirections__wrap w100p">

                            <div class="formDirections__top  formDirections__top-line">

                                <i class="formDirections__bottom-close"></i>
                                <div class="formDirections__top-tab super-grey ">Страна поездки</div>
                            </div>

                            <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">

                                <div class="SumoSelect open" tabindex="0"><select id="sumo-direction-city" class="SumoUnder" tabindex="-1">


                                        <option value="Анапа">Анапа</option>
                                        <option value="Билек">Билек</option>
                                        <option value="Сиде">Сиде</option>
                                        <option value="Сочи">Сочи</option>
                                        <option value="Севастополь">Севастополь</option>
                                        <option value="Симферополь">Симферополь</option>
                                        <option value="Анапа">Анапа</option>
                                        <option value="Билек">Билек</option>
                                        <option value="Сиде">Сиде</option>
                                        <option value="Сочи">Сочи</option>
                                        <option value="Севастополь">Севастополь</option>
                                        <option value="Симферополь">Симферополь</option>
                                        <option value="Анапа">Анапа</option>
                                        <option value="Билек">Билек</option>
                                        <option value="Сиде">Сиде</option>
                                        <option value="Сочи">Сочи</option>
                                        <option value="Севастополь">Севастополь</option>
                                        <option value="Симферополь">Симферополь</option>
                                        <option value="Анапа">Анапа</option>
                                        <option value="Билек">Билек</option>
                                        <option value="Сиде">Сиде</option>
                                        <option value="Сочи">Сочи</option>
                                        <option value="Севастополь">Севастополь</option>
                                        <option value="Симферополь">Симферополь</option>


                                    </select><p class="CaptionCont SelectBox search" title=" Анапа"><span> Анапа</span><label><i></i></label><input type="text" class="search-txt" value="" placeholder="Искать..."></p><div class="optWrapper" style="top: 0px; position: relative;"><ul class="options"><li class="opt selected" data-val="undefined"><label>Анапа</label></li><li class="opt" data-val="undefined"><label>Билек</label></li><li class="opt" data-val="undefined"><label>Сиде</label></li><li class="opt" data-val="undefined"><label>Сочи</label></li><li class="opt" data-val="undefined"><label>Севастополь</label></li><li class="opt" data-val="undefined"><label>Симферополь</label></li><li class="opt" data-val="undefined"><label>Анапа</label></li><li class="opt" data-val="undefined"><label>Билек</label></li><li class="opt" data-val="undefined"><label>Сиде</label></li><li class="opt" data-val="undefined"><label>Сочи</label></li><li class="opt" data-val="undefined"><label>Севастополь</label></li><li class="opt" data-val="undefined"><label>Симферополь</label></li><li class="opt" data-val="undefined"><label>Анапа</label></li><li class="opt" data-val="undefined"><label>Билек</label></li><li class="opt" data-val="undefined"><label>Сиде</label></li><li class="opt" data-val="undefined"><label>Сочи</label></li><li class="opt" data-val="undefined"><label>Севастополь</label></li><li class="opt" data-val="undefined"><label>Симферополь</label></li><li class="opt" data-val="undefined"><label>Анапа</label></li><li class="opt" data-val="undefined"><label>Билек</label></li><li class="opt" data-val="undefined"><label>Сиде</label></li><li class="opt" data-val="undefined"><label>Сочи</label></li><li class="opt" data-val="undefined"><label>Севастополь</label></li><li class="opt" data-val="undefined"><label>Симферополь</label></li></ul><p class="no-match"></p></div></div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="tour-selection-field tour-selection-field--200">
                    <div class="bth__inp-block js-show-formDirections ">
                        <span class="bth__inp-lbl ">Город вылета</span>
                        <span class="bth__inp uppercase"></span>
                    </div>


                    <div class="formDirections w100p" style="display: none;">
                        <div class="formDirections__wrap w100p">

                            <div class="formDirections__top  formDirections__top-line">

                                <i class="formDirections__bottom-close"></i>
                                <div class="formDirections__top-tab super-grey ">Город вылета</div>
                            </div>

                            <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">
                                <div class="SumoSelect open" tabindex="0"><select id="sumo-department" class="SumoUnder" tabindex="-1">

                                        <option value="Москва">Москва</option>
                                        <option value="Санкт-Петербург">Санкт-Петербург</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Москва">Москва</option>
                                        <option value="Санкт-Петербург">Санкт-Петербург</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>

                                    </select><p class="CaptionCont SelectBox search" title=" Москва"><span> Москва</span><label><i></i></label><input type="text" class="search-txt" value="" placeholder="Искать..."></p><div class="optWrapper" style="top: 0px; position: relative;"><ul class="options"><li class="opt selected" data-val="undefined"><label>Москва</label></li><li class="opt" data-val="undefined"><label>Санкт-Петербург</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Москва</label></li><li class="opt" data-val="undefined"><label>Санкт-Петербург</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li></ul><p class="no-match"></p></div></div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="tour-selection-field tour-selection-field--180">
                    <div class="bth__inp-block js-show-formDirections js-formDirections--big-mobile">
                        <span class="bth__inp-lbl ">Параметры отеля</span>
                        <span class="bth__inp"></span>
                    </div>

                    <div class="formDirections   formDirections--big-mobile formDirections--char" style="display: none;">

                        <div class="formDirections__top  formDirections__top-line">
                            <i class="formDirections__bottom-close"></i>
                            <div class="formDirections__top-tab super-grey">Параметры отеля</div>
                        </div>


                        <div class="formDirections__wrap formDirections__row">

                            <div class="formDirections__wrap-flex">
                                <div class="formDirections__top  formDirections__top-line">


                                    <div class="formDirections__top-tab active js-act-stars">
                                        Категория
                                    </div>

                                    <div class="formDirections__top-tab js-act-rating">

                                        Рейтинг
                                    </div>
                                    <div class="formDirections__top-tab js-act-hotels">

                                        Питание
                                    </div>
                                    <div class="formDirections__top-tab js-act-country">

                                        Расположение
                                    </div>
                                    <div class="formDirections__top-tab js-act-kid">

                                        Для детей
                                    </div>
                                    <div class="formDirections__top-tab js-act-other">

                                        Прочее
                                    </div>

                                </div>
                                <div class="formDirections__wrap-flex-right">
                                    <div class="formDirections__bottom js-search-country" style="display: none">

                                        <div class="formDirections__bottom-blocks">
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-positionckd" checked="">
                                                    <label class="label-cbx" for="added-catalog-positionckd">
                                                        <span class="cbx-cnt">Любой тип</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="formDirections__cbx-ttl">Пляжный</div>
                                            <div class=" formDirections__left-30 ">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position1">
                                                    <label class="label-cbx" for="added-catalog-position1">
                                                        <span class="cbx-cnt">1-я линия от моря</span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block  cbx-block--16   ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position2">
                                                    <label class="label-cbx" for="added-catalog-position2">
                                                        <span class="cbx-cnt">2-я линия от моря </span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position3">
                                                    <label class="label-cbx" for="added-catalog-position3">
                                                        <span class="cbx-cnt"> 3-я линия от моря</span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position4">
                                                    <label class="label-cbx" for="added-catalog-position4">
                                                        <span class="cbx-cnt">Через дорогу </span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="formDirections__cbx-ttl">Горнолыжный</div>
                                            <div class=" formDirections__left-30 ">
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position5">
                                                    <label class="label-cbx" for="added-catalog-position5">
                                                        <span class="cbx-cnt">Близко</span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position6">
                                                    <label class="label-cbx" for="added-catalog-position6">
                                                        <span class="cbx-cnt">Далеко </span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position7">
                                                    <label class="label-cbx" for="added-catalog-position7">
                                                        <span class="cbx-cnt"> Рядом</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="formDirections__cbx-ttl">Загородный</div>
                                            <div class=" formDirections__left-30 ">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position8">
                                                    <label class="label-cbx" for="added-catalog-position8">
                                                        <span class="cbx-cnt">Близко</span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position9">
                                                    <label class="label-cbx" for="added-catalog-position9">
                                                        <span class="cbx-cnt">Далеко </span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position10">
                                                    <label class="label-cbx" for="added-catalog-position10">
                                                        <span class="cbx-cnt"> Рядом</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="formDirections__cbx-ttl">Городской</div>
                                            <div class=" formDirections__left-30 ">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position11">
                                                    <label class="label-cbx" for="added-catalog-position11">
                                                        <span class="cbx-cnt">Близко к центру</span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position12">
                                                    <label class="label-cbx" for="added-catalog-position12">
                                                        <span class="cbx-cnt">Окраина </span>
                                                    </label>

                                                </div>
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-catalog-position13">
                                                    <label class="label-cbx" for="added-catalog-position13">
                                                        <span class="cbx-cnt"> Центр</span>
                                                    </label>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="formDirections__bottom js-search-hotels" style="display: none">

                                        <div class="formDirections__bottom-blocks">

                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block    cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-food-typeckd" checked="">
                                                    <label class="label-cbx" for="added-food-typeckd">
                                                        <span class="cbx-cnt">Любое питание</span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block    cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-food-type1">
                                                    <label class="label-cbx" for="added-food-type1">
                                                        <span class="cbx-cnt">AI Все включено</span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-food-type2">
                                                    <label class="label-cbx" for="added-food-type2">
                                                        <span class="cbx-cnt">FB  Завтрак + обед + ужин</span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block    cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-food-type3">
                                                    <label class="label-cbx" for="added-food-type3">
                                                        <span class="cbx-cnt">HB  Завтрак +  ужин</span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block     cbx-block--16">
                                                    <input type="checkbox" class="cbx" id="added-food-type4">
                                                    <label class="label-cbx" for="added-food-type4">
                                                        <span class="cbx-cnt"> BB Завтрак</span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block    cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-food-type5">
                                                    <label class="label-cbx" for="added-food-type5">
                                                        <span class="cbx-cnt">RO Без питания</span>
                                                    </label>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="formDirections__bottom js-search-stars">

                                        <div class="formDirections__bottom-blocks">
                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-stars-ckd" checked="">
                                                    <label class="label-cbx " for="added-stars-ckd">
                                                        <span class="cbx-cnt">Любая категория</span>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block  cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-stars-5">
                                                    <label class="label-cbx " for="added-stars-5">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block    cbx-block--16">
                                                    <input type="checkbox" class="cbx" id="added-stars-4">
                                                    <label class="label-cbx " for="added-stars-4">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-stars-3">
                                                    <label class="label-cbx " for="added-stars-3">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-stars-2">
                                                    <label class="label-cbx " for="added-stars-2">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-stars-1">
                                                    <label class="label-cbx " for="added-stars-1">
                                                        <i class="fa fa-star"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-stars-hv1">
                                                    <label class="label-cbx" for="added-stars-hv1">
                                                        <span class="cbx-cnt">HV1</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block   cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-stars-hv2">
                                                    <label class="label-cbx" for="added-stars-hv2">
                                                        <span class="cbx-cnt">HV2</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-dropdown-stars__item">
                                                <div class="cbx-block    cbx-block--16">
                                                    <input type="checkbox" class="cbx" id="no-stars">
                                                    <label class="label-cbx" for="no-stars">
                                                        <span class="cbx-cnt">Без категории</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formDirections__bottom-blocks js-search-rating" style="display: none">


                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333ratingckd" checked="">
                                                <label class="label-rbt" for="added-333ratingckd">
                                                    <span class="rbt-cnt  uppercase">Любой рейтинг</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating1">
                                                <label class="label-rbt" for="added-333rating1">
                                                    <span class="rbt-cnt  uppercase">Не важно</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating3">
                                                <label class="label-rbt" for="added-333rating3">
                                                    <span class="rbt-cnt  uppercase"> Не ниже 4,75</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating4">
                                                <label class="label-rbt" for="added-333rating4">
                                                    <span class="rbt-cnt  uppercase">  Не ниже 4,5</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating5">
                                                <label class="label-rbt" for="added-333rating5">
                                                    <span class="rbt-cnt  uppercase">  Не ниже 4,25</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating6">
                                                <label class="label-rbt" for="added-333rating6">
                                                    <span class="rbt-cnt  uppercase">Не ниже 4,0</span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating7">
                                                <label class="label-rbt" for="added-333rating7">
                                                    <span class="rbt-cnt  uppercase">Не ниже 3,75</span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating8">
                                                <label class="label-rbt" for="added-333rating8">
                                                    <span class="rbt-cnt  uppercase">     Не ниже 3,5</span>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-dropdown-stars__item ">
                                            <div class="rbt-block  ">
                                                <input type="radio" name="added-333rating" class="rbt " id="added-333rating9">
                                                <label class="label-rbt" for="added-333rating9">
                                                    <span class="rbt-cnt  uppercase">       Не ниже 3,25</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formDirections__bottom js-search-kid" style="display: none">

                                        <div class="formDirections__bottom-blocks">

                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-chl1">
                                                    <label class="label-cbx" for="added-chl1">
                                                        <span class="cbx-cnt">ДЕТСКИЙ ГОРШОК</span>
                                                    </label>

                                                </div>
                                            </div>


                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block    cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-chl2">
                                                    <label class="label-cbx" for="added-chl2">
                                                        <span class="cbx-cnt">  ДЕТСКИЕ БЛЮДА</span>
                                                    </label>

                                                </div>
                                            </div>


                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-chl3">
                                                    <label class="label-cbx" for="added-chl3">
                                                        <span class="cbx-cnt">ПЕЛЕНАЛЬНЫЙ СТОЛИК</span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-chl4">
                                                    <label class="label-cbx" for="added-chl4">
                                                        <span class="cbx-cnt">AНИМАЦИЯ</span>
                                                    </label>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="formDirections__bottom js-search-other" style="display: none">

                                        <div class="formDirections__bottom-blocks">

                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block   cbx-block--16  ">
                                                    <input type="checkbox" class="cbx" id="added-other1">
                                                    <label class="label-cbx" for="added-other1">
                                                        <span class="cbx-cnt">ВЕСЕЛАЯ АНИМАЦИЯ</span>
                                                    </label>

                                                </div>
                                            </div>


                                            <div class="form-dropdown-stars__item ">
                                                <div class="cbx-block    cbx-block--16 ">
                                                    <input type="checkbox" class="cbx" id="added-other2">
                                                    <label class="label-cbx" for="added-other2">
                                                        <span class="cbx-cnt">  ТУСОВКИ РЯДОМ С ОТЕЛЕМ </span>
                                                    </label>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="formDirections__btn-orange js-close-formDirections">Применить</div>
                    </div>


                </div>
                <span class=" tour-selection-plus js-del-field"><i class="fas fa-minus"></i></span>
            </div>
        </div>


        <div class=" js-types-search-hotel-blocks" style="display: none">
            <div class="tour-selection-wrap-in tour-selection-wrap-flex ">
                <div class="tour-selection-field tour-selection-field--250">
                    <div class="bth__inp-block js-show-formDirections">
                        <span class="bth__inp-lbl ">Город вылета</span>
                        <span class="bth__inp">
                                </span>
                    </div>

                    <div class="formDirections w100p" style="display: none;">
                        <div class="formDirections__wrap w100p">

                            <div class="formDirections__top  formDirections__top-line">

                                <i class="formDirections__bottom-close"></i>
                                <div class="formDirections__top-tab super-grey ">Город вылета</div>
                            </div>

                            <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">
                                <div class="SumoSelect open" tabindex="0"><select id="sumo-department" class="SumoUnder" tabindex="-1">

                                        <option value="Москва">Москва</option>
                                        <option value="Санкт-Петербург">Санкт-Петербург</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Москва">Москва</option>
                                        <option value="Санкт-Петербург">Санкт-Петербург</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>
                                        <option value="Абакан">Абакан</option>
                                        <option value="Агзу">Агзу</option>

                                    </select><p class="CaptionCont SelectBox search" title=" Москва"><span> Москва</span><label><i></i></label><input type="text" class="search-txt" value="" placeholder="Искать..."></p><div class="optWrapper" style="top: 0px; position: relative;"><ul class="options"><li class="opt selected" data-val="undefined"><label>Москва</label></li><li class="opt" data-val="undefined"><label>Санкт-Петербург</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Москва</label></li><li class="opt" data-val="undefined"><label>Санкт-Петербург</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li><li class="opt" data-val="undefined"><label>Абакан</label></li><li class="opt" data-val="undefined"><label>Агзу</label></li></ul><p class="no-match"></p></div></div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="tour-selection-field tour-selection-field--250">
                    <div class="bth__inp-block js-show-formDirections">

                        <span class="bth__inp-lbl ">Питание</span>
                        <span class="bth__inp">
                                </span>
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
                                            <input type="checkbox" class="cbx" id="8eat2-type1">
                                            <label class="label-cbx" for="8eat2-type1">
                                                <span class="cbx-cnt">AI Все включено</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16">
                                            <input type="checkbox" class="cbx" id="8eat2-type2">
                                            <label class="label-cbx" for="8eat2-type2">
                                                <span class="cbx-cnt">FB  Завтрак + обед + ужин</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16 ">
                                            <input type="checkbox" class="cbx" id="8eat2-type3">
                                            <label class="label-cbx" for="8eat2-type3">
                                                <span class="cbx-cnt">HB  Завтрак +  ужин</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block    cbx-block--16 ">
                                            <input type="checkbox" class="cbx" id="8eat2-type4">
                                            <label class="label-cbx" for="8eat2-type4">
                                                <span class="cbx-cnt"> BB Завтрак</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-dropdown-stars__item ">
                                        <div class="cbx-block   cbx-block--16  ">
                                            <input type="checkbox" class="cbx" id="8eat2-type5">
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
            <div class="tour-selection-wrap-in tour-selection-wrap-flex ">
                <div class="tour-selection-field tour-selection-field--740">
                    <div class="bth__inp-block js-show-formDirections js-formDirections--big-mobile">

                        <span class="bth__inp-lbl ">Добавить отель</span>
                        <span class="bth__inp"></span>
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

                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Mriya Resort &amp; Spa (Мрия Резорт энд Спа) </span>5*
                                        </div>
                                        <span class="formDirections__count">Агитос Антониос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa</span> 5*
                                        </div>
                                        <span class="formDirections__count">Кампос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya </span>5*
                                        </div>
                                        <span class="formDirections__count">Каравостаси</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>

                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya</span> 5*

                                        </div>
                                        <span class="formDirections__count">Никитари</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Mriya Resort &amp; Spa (Мрия Резорт энд Спа) </span>5*
                                        </div>
                                        <span class="formDirections__count">Агитос Антониос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa</span> 5*
                                        </div>
                                        <span class="formDirections__count">Кампос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya </span>5*
                                        </div>
                                        <span class="formDirections__count">Каравостаси</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>

                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya</span> 5*

                                        </div>
                                        <span class="formDirections__count">Никитари</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <span class="tour-selection-plus hide-1023 js-add-hotel"><i class="fas fa-plus"></i></span>
            </div>

            <div class="tour-selection-wrap-in tour-selection-wrap-flex js-show-add-hotel " style="display: none">
                <div class="tour-selection-field tour-selection-field--740">
                    <div class="bth__inp-block js-show-formDirections js-formDirections--big-mobile">

                        <span class="bth__inp-lbl ">Добавить отель</span>
                        <span class="bth__inp"></span>
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

                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Mriya Resort &amp; Spa (Мрия Резорт энд Спа) </span>5*
                                        </div>
                                        <span class="formDirections__count">Агитос Антониос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa</span> 5*
                                        </div>
                                        <span class="formDirections__count">Кампос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya </span>5*
                                        </div>
                                        <span class="formDirections__count">Каравостаси</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>

                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya</span> 5*

                                        </div>
                                        <span class="formDirections__count">Никитари</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Mriya Resort &amp; Spa (Мрия Резорт энд Спа) </span>5*
                                        </div>
                                        <span class="formDirections__count">Агитос Антониос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa</span> 5*
                                        </div>
                                        <span class="formDirections__count">Кампос</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>
                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya </span>5*
                                        </div>
                                        <span class="formDirections__count">Каравостаси</span>
                                    </div>
                                    <div class="formDirections__bottom-item">
                                        <div class="formDirections__city">
                                            <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-1">
                                                <div class="hint">Россия</div>
                                            </div>

                                            <span class="formDirections__cut"> Resort &amp; Spa Mriya</span> 5*

                                        </div>
                                        <span class="formDirections__count">Никитари</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <span class=" tour-selection-plus  js-del-hotel"><i class="fas fa-minus"></i></span>
            </div>


        </div>


        <div class="tour-selection-wrap-in">
            <div class="bth__ta-resizable-wrap">
                <div class="bth__ta-resizable" contenteditable="" id="optional"></div>
                <?= $form->field($model, 'optional')->hiddenInput()->label(false); ?>
                <span class="bth__ta-resizable-hint" >Дополнительные пожелания</span>

            </div>
        </div>

        <div class="tour-selection-wrap-in">
            <div class=" bth__btn  bth__btn--fill bth__loader" id="extend_submit">
                Сформировать заявку
                <div class=" bth__loader-spin">
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                </div>
            </div>


        </div>
    </div>
    <?php ActiveForm::end(); ?>​

</div>