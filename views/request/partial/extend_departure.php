<div class="tour-selection-field tour-selection-field--200">
    <div class="bth__inp-block js-show-formDirections" data-id="<?=$data_id?>">
        <span class="bth__inp-lbl --center active">Город вылета</span>
        <span class="bth__inp " id="direct_departure-<?=$data_id?>">Не важно</span>
    </div>
    <div class="formDirections w100p" style="display: none;">
        <div class="formDirections__wrap w100p">

            <div class="formDirections__top  formDirections__top-line">
                <i class="formDirections__bottom-close"></i>
                <div class="formDirections__top-tab super-grey ">Город вылета</div>
            </div>
            <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search">
                <?= $form->field($model, 'direct[departure_id][]')->dropDownList(
                        $items_city_deprt,
                        [
                                'id'=>"sumo-departure-".$data_id,
                                'class'=>"sumo-departure",
                                'data_id'=>$data_id

                        ])
                    ->label(false);
                ?>
            </div>
        </div>
    </div>
</div>