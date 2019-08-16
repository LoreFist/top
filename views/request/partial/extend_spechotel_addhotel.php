<div class="tour-selection-field tour-selection-field--740">
    <div class="bth__inp-block js-show-formDirections js-formDirections--big-mobile">
        <span class="bth__inp-lbl" id="label-add-hotel-<?= $data_id ?>" data-id-location="">Добавить отель</span>
        <span class="bth__inp">
        <span class="hotel-search">
            <span class="hotel-search__cut-<?= $data_id ?>"></span>
            <span class="hotel-search__rating-<?= $data_id ?>"></span>
            <span class="hotel-search__place-<?= $data_id ?>"></span>
        </span>
    </span>
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
                    <input class="bth__inp" type="text" placeholder="Поиск отеля" data-id="<?= $data_id ?>">
                </div>
                <div class="formDirections__wrap  formDirections__bottom-blocks-cut" id="add_hotel-<?= $data_id ?>">
                    <div class="formDirections__bottom-item">
                        <span>По указанному названию совпадений не найденo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>