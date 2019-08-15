<?php

use yii\helpers\ArrayHelper;

?>
<div class="tour-selection-field tour-selection-field--250">
    <div class="bth__inp-block bth__inp-block--meal js-show-formDirections">
        <span class="bth__inp-lbl active">Питание</span>
        <span class="bth__inp" id="label_food">ЛЮБОЕ</span>
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
                    <?= $form
                        ->field($model, 'foods')
                        ->checkBoxList(ArrayHelper::map($food, 'short_name', 'name'),[
                                'item' => function($index, $label, $name, $checked, $value) {
                                    if($value=='ALL')
                                        $checked = 'checked';
                                    return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx' id='type-food{$value}'>
                                                    <label class='label-cbx' for='type-food{$value}'>
                                                        <span class='cbx-cnt'>{$label}</span>
                                                    </label>
                                                </div>
                                            </div>   
                                            ";
                                }]
                            )
                        ->label(false)
                    ?>

                    <div class="formDirections__static-btn js-close-formDirections">Применить</div>
                </div>
            </div>
        </div>
    </div>
</div>