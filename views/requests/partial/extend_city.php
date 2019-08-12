<div class="tour-selection-field tour-selection-field--180">
    <div class="bth__inp-block js-show-formDirections">

        <span class="bth__inp-lbl --center active" >Город</span>
        <span class="bth__inp" id="city_direction">Не важно</span>
    </div>


    <div class="formDirections w100p" style="display: none;">
        <div class="formDirections__wrap w100p">

            <div class="formDirections__top  formDirections__top-line">

                <i class="formDirections__bottom-close"></i>
                <div class="formDirections__top-tab super-grey" id="text-city-select">Укажите страну</div>
            </div>

            <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">
                <?= $form->field($model, 'direct_country')->dropDownList(
                    [],
                    [
                        'id'=>"sumo-direction-city",
                        'empty'=>'Не важно',
                        'style'=>'display:none'
                    ])
                    ->label(false);
                ?>
            </div>

        </div>
    </div>
</div>