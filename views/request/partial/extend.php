<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile(
    '@web/js/help-extend.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
    '@web/js/help-spechotel.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>
<?php $form = ActiveForm::begin(['id' => 'form-extend',]);?>
<div class="panel" id="step1Panel" style="display: none">
    <div class="tour-selection-wrap" id="step1_wrap">
        <div class="bth__cnt uppercase">Пожалуйста, укажите параметры вашей
            поездки
        </div>
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
                <?php echo $this->context->renderPartial('partial/extend_hotel',[
                    'model'    => $model,
                    'form'     => $form,
                    'items_dict' => $items_dict,
                    'data_id'  => $data_id,
                ]); ?>

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
                     'data_id'          => $data_id
                    ]
                ); ?>
                <?php echo $this->context->renderPartial('partial/extend_hotel',[
                    'model'    => $model,
                    'form'     => $form,
                    'items_dict' => $items_dict,
                    'data_id'  => $data_id,
                ]); ?>
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
                <?php echo $this->context->renderPartial('partial/extend_departure',[
                    'model'            => $model,
                    'form'             => $form,
                    'items_city_deprt' => $items_dict['city_deprt'],
                    'data_id'          => $data_id,
                ]); ?>

                <?php echo $this->context->renderPartial('partial/extend_hotel',[
                    'model'    => $model,
                    'form'     => $form,
                    'items_dict' => $items_dict,
                    'data_id'  => $data_id,
                ]); ?>
                <span class="tour-selection-plus js-del-field" data_id=<?= $data_id ?>><i class="fas fa-minus"></i></span>
            </div>
        </div>

        <div class=" js-types-search-hotel-blocks" style="display: none">
            <div class="tour-selection-wrap-in tour-selection-wrap-flex ">
<!--                --><?php //echo $this->context->renderPartial('partial/extend_spechotel_city',['items_city_spechotel' => $items_dict['spec_hotel'], 'model' => $model, 'form' => $form, 'data_id' => $data_id]); ?>
                <?php echo $this->context->renderPartial(
                    'partial/extend_departure',
                    ['model'            => $model, 'form' => $form,
                     'items_city_deprt' => $items_dict['city_deprt'],
                     'data_id'          => 4]
                ); ?>
                <?php echo $this->context->renderPartial('partial/extend_spechotel_food',['food' => $items_dict['food'], 'model' => $model, 'form' => $form, 'data_id' => $data_id]); ?>
            </div>

            <div class="tour-selection-wrap">
                <?php $data_id = 0; ?>
                <div data-tour-row="<?= $data_id ?>" class="tour-selection-wrap-in tour-selection-wrap-flex ">
                    <?php echo $this->context->renderPartial('partial/extend_spechotel_addhotel',['data_id'=>$data_id]); ?>
                    <span class="tour-selection-plus hide-1023 js-add-spechotel" data_id=<?= $data_id ?>><i class="fas fa-plus"></i></span>
                </div>

                <?php $data_id = 1; ?>
                <div data-tour-row="<?= $data_id ?>" class="tour-selection-wrap-in tour-selection-wrap-flex tour-selection-wrap-in--hidden js-show-added-spechotel js-hide-dell-spechotel-<?= $data_id ?>" style="display:none;">
                    <?php echo $this->context->renderPartial('partial/extend_spechotel_addhotel',['data_id'=>$data_id]); ?>
                    <span class=" tour-selection-plus js-del-spechotel" data_id=<?= $data_id ?>><i class="fas fa-minus"></i></span>
                </div>

                <?php $data_id = 2; ?>
                <div data-tour-row="<?= $data_id ?>" class="tour-selection-wrap-in tour-selection-wrap-flex tour-selection-wrap-in--hidden js-show-added-spechotel js-hide-dell-spechotel-<?= $data_id ?>" style="display:none;">
                    <?php echo $this->context->renderPartial('partial/extend_spechotel_addhotel',['data_id'=>$data_id]); ?>
                    <span class=" tour-selection-plus js-del-spechotel" data_id=<?= $data_id ?>><i class="fas fa-minus"></i></span>
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
    </div sty>

    <div class="tour-selection-wrap" id="step2_wrap" style="display: none">

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
            <div class="tour-selection-wrap__abs-txt  bth__cnt bth__cnt--sm" style="line-height: 0px;top: 97px;">
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