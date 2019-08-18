<?php
use yii\helpers\ArrayHelper;
?>
<div class="tour-selection-field tour-selection-field--180">
    <div class="bth__inp-block bth__inp-block--hotel-params js-show-formDirections js-formDirections--big-mobile">
        <span class="bth__inp-lbl ">Параметры отеля</span>
        <span class="bth__inp"></span>
    </div>

    <div class="formDirections   formDirections--big-mobile formDirections--char" style="display: none;">
        <div class="formDirections__top  formDirections__top-line">
            <i class="formDirections__bottom-close"></i>
            <div class="formDirections__top-tab super-grey">Параметры отеля</div>
        </div>
        <div class="formDirections__wrap formDirections__row">
            <div class="formDirections__wrap-flex">
                <div class="formDirections__top  formDirections__top-line">
                    <div class="formDirections__top-tab js-search-stars active">
                        Категория
                    </div>
                    <div class="formDirections__top-tab js-search-rating">
                        Рейтинг
                    </div>
                    <div class="formDirections__top-tab js-search-hotels">
                        Питание
                    </div>
                    <div class="formDirections__top-tab js-search-country">
                        Расположение
                    </div>
                    <div class="formDirections__top-tab js-search-kid">
                        Для детей
                    </div>
                    <div class="formDirections__top-tab js-search-other">
                        Прочее
                    </div>
                </div>
                <div class="formDirections__wrap-flex-right">
                    <div class="formDirections__bottom js-search-stars">
                        <div class="formDirections__bottom-blocks">
                            <div class="form-dropdown-stars__item ">
                                <div class="cbx-block  cbx-block--16  ">
                                    <input name="Request[direct][category][]" value="any" type="checkbox" class="cbx" id="type-category0" checked="">
                                    <label class="label-cbx " for="type-category0">
                                        <span class="cbx-cnt uppercase">Любая категория</span>
                                    </label>
                                </div>
                            </div>
                            <?= $form
                                ->field($model, 'direct[category][]')
                                ->checkBoxList(ArrayHelper::map($items_dict['category'], 'id', 'name'),[
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            if($label[1] == '*') {
                                                $countStars = $label[0];
                                                $label = '';
                                                for ($i=0; $i<$countStars; $i++)
                                                    $label .= '<i class="fa fa-star"></i>';
                                            }elseif ($label == 'No Category')
                                                $label = 'Без категории';
                                            return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx' id='type-category{$value}'>
                                                    <label class='label-cbx' for='type-category{$value}'>
                                                        <span class='cbx-cnt uppercase'>{$label}</span>
                                                    </label>
                                                </div>
                                            </div>   
                                            ";
                                        }]
                                )
                                ->label(false)
                            ?>

                        </div>
                    </div>
                    <div class="formDirections__bottom js-search-rating" style="display: none">
                        <?= $form
                            ->field($model, 'direct[rating][]')
                            ->radioList(ArrayHelper::map($items_dict['rating'], 'id', 'name'),[
                                    'item' => function($index, $label, $name, $checked, $value) {
                                        return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='rbt-block'>
                                                    <input type='radio' name='{$name}' value='{$value}' class='rbt' id='333rating{$value}' {$checked}>
                                                    <label class='label-rbt' for='333rating{$value}'>
                                                        <span class='rbt-cnt uppercase'>{$label}</span>
                                                    </label>
                                                </div>
                                            </div>   
                                            ";
                                    }]
                            )
                            ->label(false)
                        ?>
                    </div>
                    <div class="formDirections__bottom js-search-hotels" style="display: none">
                        <?= $form
                            ->field($model, 'direct[food][]')
                            ->checkBoxList(ArrayHelper::map($items_dict['food'], 'short_name', 'name'),[
                                    'item' => function($index, $label, $name, $checked, $value) {
                                        if($value=='ALL')
                                            $checked = 'checked';
                                        return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx' id='333eat2-typeckd_{$value}'>
                                                    <label class='label-cbx' for='333eat2-typeckd_{$value}'>
                                                        <span class='cbx-cnt'>{$label}</span>
                                                    </label>
                                                </div>
                                            </div>   
                                            ";
                                    }]
                            )
                            ->label(false)
                        ?>
                    </div>

                    <div class="formDirections__bottom js-search-kid" style="display: none">
                        <div class="formDirections__bottom-blocks">
                            <?= $form
                                ->field($model, 'direct[forkids][]')
                                ->checkBoxList(ArrayHelper::map($items_dict['forkids'], 'id', 'name'),[
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx' id='333kid1_{$value}'>
                                                    <label class='label-cbx' for='333kid1_{$value}'>
                                                        <span class='cbx-cnt uppercase'>{$label}</span>
                                                    </label>
                                                </div>
                                            </div>   
                                            ";
                                        }]
                                )
                                ->label(false)
                            ?>
                        </div>
                    </div>
                    <div class="formDirections__bottom js-search-other" style="display: none">
                        <div class="formDirections__bottom-blocks">
                            <?= $form
                                ->field($model, 'direct[other][]')
                                ->checkBoxList(ArrayHelper::map($items_dict['other'], 'id', 'name'),[
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx' id='333other{$value}'>
                                                    <label class='label-cbx' for='333other{$value}'>
                                                        <span class='cbx-cnt uppercase'>{$label}</span>
                                                    </label>
                                                </div>
                                            </div>   
                                            ";
                                        }]
                                )
                                ->label(false)
                            ?>
                        </div>
                    </div>

                    <div class="formDirections__bottom js-search-country" style="display: none">
                        <div class="formDirections__bottom-blocks">
                            <div class="form-dropdown-stars__item">
                                <div class="cbx-block   cbx-block--16 ">
                                    <input name="tour_place_0[]" value="any" type="checkbox" class="cbx" id="catalog-positionckd_0" checked="">
                                    <label class="label-cbx" for="catalog-positionckd_0">
                                        <span class="cbx-cnt">Любой тип</span>
                                    </label>
                                </div>
                            </div>
                            <?php foreach ($items_dict['palaceType'] as $type):?>
                                <div class="formDirections__cbx-ttl"><?=$type->name?></div>
                                    <div class=" formDirections__left-30 ">
                                        <?php foreach ($type->values as $value): ?>
                                            <div class="cbx-block   cbx-block--16 ">
                                                <input name="direct[palacetype][]" value="<?=$value->id?>" type="checkbox" class="cbx" id="palace_type_<?=$value->id?>">
                                                <label class="label-cbx" for="palace_type_<?=$value->id?>">
                                                    <span class="cbx-cnt"><?=$value->name?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="formDirections__btn-orange submit-hotel-params">Применить</div>
    </div>
</div>