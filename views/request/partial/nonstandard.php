<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile(
    '@web/js/help-selection.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<div class="panel" id="formPanel" style="">

    <div class="bth__cnt uppercase">Пожалуйста, укажите параметры вашей
        поездки
    </div>

    <div class="tour-selection-wrap">

        <?php $form = ActiveForm::begin([
            'id' => 'form-nostadndatd',
        ]); ?>
        <div class="tour-selection-wrap-in">
            <div class="bth__inp-block long">
                <?= $form->field($model, 'optional',[
                        'template' => '
                                        {input}
                                        <label for="parametrs" class="bth__inp-lbl">
                                            <span class="block  mb5">- укажите страну, курорт или отель</span>
                                            <span class="block  mb5">- количество человек</span>
                                            <span class="block  mb5">- ваши предпочтения по отелю</span>
                                            <span class="block mb5">- ваш бюджет</span>
                                            <span class="block">- другие пожелания</span>
                                        </label>
                                        '
                        ])
                        ->textarea([
                                    'type'  => 'text',
                                    'class' => 'bth__inp  bold js-stop-label',
                                    'id'    => 'parametrs'
                ])?>
            </div>
        </div>

        <div class="tour-selection-wrap-in tour-selection-wrap-flex">
            <div class="tour-selection-field tour-selection-field--30p">
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
                        ['class' => 'bth__inp js-label', 'id' => 'name1',]
                    )
                    ->label();
                ?>
            </div>

            <div class="tour-selection-field tour-selection-field--30p">
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
                        'labelOptions' => ['class' => 'bth__inp-lbl'],
                        'options'      => ['class' => 'js-add-error bth__inp-block'],
                    ]
                )
                    ->textInput(
                        ['class' => 'bth__inp js-label', 'id' => 'phone_nostan',]
                    )
                    ->label();
                ?>
            </div>

            <div class="tour-selection-field tour-selection-field--30p">
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

        <?= $form->field($model, 'created_at',['enableAjaxValidation' => false])->hiddenInput(['id'=>'create_at_n'])->label(false)->error(false) ?>

        <div class="tour-selection-wrap-in">
            <div class=" bth__btn  bth__btn--fill bth__loader" id='nonstandard_submit'>
                Отправить заявку*
                <div class=" bth__loader-spin">
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                    <i class="fas fa-circle"></i>
                </div>
            </div>

            <div class="tour-selection-wrap__abs-txt  bth__cnt bth__cnt--sm">
                *Нажимая на кнопку "отправить", я принимаю
                <a href="#p-agreement-pp" class="p-agreement-pp agree">
                    Соглашение об обработке личных данных</a> и
                <a href="#p-agreement-pp" class="p-agreement-pp site-role">Правила
                    сайта</a>
            </div>

        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
<div class="panel" id="thx" style="display:none">
    <div class="bth__cnt fz18 bold" >Спасибо, Ваша заявка отправлена и будет обработана в ближайшее время.</div>
</div>