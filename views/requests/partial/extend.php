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
                <?php $data_id = 0; ?>
                <?php echo $this->context->renderPartial('partial/extend_country', ['model'=>$model, 'form'=>$form, 'items_dict_country'=>$items_dict['country'], 'data_id'=>$data_id]); ?>
                <?php echo $this->context->renderPartial('partial/extend_city', ['model'=>$model, 'form'=>$form, 'data_id'=>$data_id]); ?>
                <?php echo $this->context->renderPartial('partial/extend_department', ['model'=>$model, 'form'=>$form, 'items_city_deprt'=>$items_dict['city_deprt'], 'data_id'=>$data_id]); ?>
<!--                --><?php //echo $this->context->renderPartial('partial/extend__'); ?>

                <span class=" tour-selection-plus  hide-1023 js-add-field"><i class="fas fa-plus"></i></span>
            </div>

            <div class="tour-selection-wrap-in tour-selection-wrap-flex js-show-added-field" style="display: none">
                <?php $data_id = 1; ?>
                <?php echo $this->context->renderPartial('partial/extend_country', ['model'=>$model, 'form'=>$form, 'items_dict_country'=>$items_dict['country'], 'data_id'=>$data_id]); ?>
                <?php echo $this->context->renderPartial('partial/extend_city', ['model'=>$model, 'form'=>$form, 'data_id'=>$data_id]); ?>
                <?php echo $this->context->renderPartial('partial/extend_department', ['model'=>$model, 'form'=>$form, 'items_city_deprt'=>$items_dict['city_deprt'], 'data_id'=>$data_id]); ?>

                <span class=" tour-selection-plus js-del-field"><i class="fas fa-minus"></i></span>
            </div>

            <div class="tour-selection-wrap-in tour-selection-wrap-flex js-show-added-field" style="display: none">
                <?php $data_id = 2; ?>
                <?php echo $this->context->renderPartial('partial/extend_country', ['model'=>$model, 'form'=>$form, 'items_dict_country'=>$items_dict['country'], 'data_id'=>$data_id]); ?>
                <?php echo $this->context->renderPartial('partial/extend_city', ['model'=>$model, 'form'=>$form, 'data_id'=>$data_id]); ?>
                <?php echo $this->context->renderPartial('partial/extend_department', ['model'=>$model, 'form'=>$form, 'items_city_deprt'=>$items_dict['city_deprt'], 'data_id'=>$data_id]); ?>

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