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
                <?= $form->field($model, 'direct_department')->dropDownList($items_city_deprt,['id'=>"sumo-department", 'empty'=>'Не важно'])->label(false); ?>
            </div>

        </div>
    </div>


</div>