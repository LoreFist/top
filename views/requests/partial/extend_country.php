<div class="tour-selection-field tour-selection-field--250 ">
    <div class="bth__inp-block js-show-formDirections">
        <span class="bth__inp-lbl bth__inp-lbl--center active">Страна поездки</span>
        <div class="js-lsfw-ppdb bth__inp tour-selection__country">
            <div id="country_direction_Flag-<?=$data_id?>" class="tour-selection__flag"></div>
            <b id="country_direction-<?=$data_id?>" class="bth__inp" style="padding: 0px;">Не важно</b>
        </div>

        <div class="formDirections w100p" style="display: none;">
            <div class="formDirections__wrap w100p">

                <div class="formDirections__top  formDirections__top-line">

                    <i class="formDirections__bottom-close"></i>
                    <div class="formDirections__top-tab super-grey ">Страна поездки</div>
                </div>

                <div class="SumoSelect formDirections__SumoSelect formDirections__SumoSelect-search sumoselect-country">
                    <?php $model->direct_country = 1; ?>
                    <?= $form->field($model, 'direct_country[]')->dropDownList(
                            $items_dict_country,
                            [
                                    'id'=>"sumo-direction-country",
                                    'class'=>"sumo-direction-country",
                                    'data_id'=>$data_id
                            ])
                        ->label(false);
                    ?>
                </div>

            </div>
        </div>
    </div>


</div>