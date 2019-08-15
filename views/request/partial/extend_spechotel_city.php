<div class="tour-selection-field tour-selection-field--250">

    <div class="bth__inp-block js-show-formDirections">
        <span class="bth__inp-lbl active">Город вылета</span>
        <span class="bth__inp uppercase" id="departure_spechotel">без перелета</span>
    </div>

    <div class="formDirections w100p" style="display: none;">

        <div class="formDirections__wrap w100p">

            <div class="formDirections__top  formDirections__top-line">
                <i class="formDirections__bottom-close"></i>
                <div class="formDirections__top-tab super-grey ">Город вылета</div>
            </div>

            <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">
                    <?= $form->field($model, 'direct[departure_id][spechotel]')->dropDownList(
                        $items_city_spechotel,
                        [
                            'id'=>"sumo-departure-spechotel-".$data_id,
                            'class'=>"sumo-departure-spechotel",
                            'data_id'=>$data_id

                        ])
                        ->label(false);
                    ?>
                <p class="no-match"></p><p class="no-match"></p>
            </div>

        </div>

    </div>

</div>