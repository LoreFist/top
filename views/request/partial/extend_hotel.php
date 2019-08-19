<?php
use yii\helpers\ArrayHelper;
?>
<div class="tour-selection-field tour-selection-field--180" data-id="<?=$data_id?>">
    <div class="bth__inp-block bth__inp-block--hotel-params js-show-formDirections js-formDirections--big-mobile">
        <span class="bth__inp-lbl param-hotel-lbl-<?=$data_id?>">Параметры отеля</span>
        <span class="bth__inp uppercase param-hotel-<?=$data_id?>"></span>
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
                <div class="formDirections__wrap-flex-right form-change<?=$data_id?>">
                    <div class="formDirections__bottom_ph<?=$data_id?> js-search-stars">
                        <div class="formDirections__bottom-blocks">
                            <div class="form-dropdown-stars__item ">
                                <div class="cbx-block  cbx-block--16  ">
                                    <input name="Request[direct][<?=$data_id?>][category][]" value="any" type="checkbox" class="cbx checkbox-stars checkbox-stars<?=$data_id?>" id="type-category<?=$data_id?>_0" checked="">
                                    <label class="label-cbx " for="type-category<?=$data_id?>_0">
                                        <span class="cbx-cnt uppercase">Любая категория</span>
                                    </label>
                                </div>
                            </div>
                            <?= $form
                                ->field($model, "direct[$data_id][category][]")
                                ->checkBoxList(ArrayHelper::map($items_dict['category'], 'id', 'name'),[
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            if($label[1] == '*') {
                                                $countStars = $label[0];
                                                $label = '';
                                                for ($i=0; $i<$countStars; $i++)
                                                    $label .= '<i class="fa fa-star"></i>';
                                            }elseif ($label == 'No Category')
                                                $label = 'Без категории';
                                            $data_id = mb_substr( explode('[',$name)[2],0,-1);
                                            return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx checkbox-stars checkbox-stars{$data_id}' id='type-category{$data_id}_{$value}'>
                                                    <label class='label-cbx' for='type-category{$data_id}_{$value}'>
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

                    <div class="formDirections__bottom_ph<?=$data_id?> js-search-rating" style="display: none">
                        <?= $form
                            ->field($model, "direct[$data_id][rating][]")
                            ->radioList(ArrayHelper::map($items_dict['rating'], 'id', 'name'),[
                                    'item' => function($index, $label, $name, $checked, $value) {
                                        if($index == 0)
                                            $classDef = 'set-checked';
                                        else
                                            $classDef = '';

                                        $data_id = mb_substr( explode('[',$name)[2],0,-1);
                                        return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='rbt-block'>
                                                    <input type='radio' name='{$name}' value='{$value}' class='rbt {$classDef}' id='333rating{$data_id}_{$value}' {$checked}>
                                                    <label class='label-rbt' for='333rating{$data_id}_{$value}'>
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
                    <div class="formDirections__bottom_ph<?=$data_id?> js-search-hotels" style="display: none">
                        <?= $form
                            ->field($model, "direct[$data_id][food][]")
                            ->checkBoxList(ArrayHelper::map($items_dict['food'], 'short_name', 'name'),[
                                    'item' => function($index, $label, $name, $checked, $value) {
                                        if($value=='ALL')
                                            $checked = 'checked';
                                        $data_id = mb_substr( explode('[',$name)[2],0,-1);
                                        return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx food_obj food_param_hotel_{$data_id}' id='type-food-param-hotel_{$data_id}{$value}'>
                                                    <label class='label-cbx' for='type-food-param-hotel_{$data_id}{$value}'>
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

                    <div class="formDirections__bottom_ph<?=$data_id?> js-search-kid" style="display: none">
                        <div class="formDirections__bottom-blocks">
                            <?= $form
                                ->field($model, "direct[$data_id][forkids][]")
                                ->checkBoxList(ArrayHelper::map($items_dict['forkids'], 'id', 'name'),[
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            $data_id = mb_substr( explode('[',$name)[2],0,-1);
                                            return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx' id='333kid{$data_id}_{$value}'>
                                                    <label class='label-cbx' for='333kid{$data_id}_{$value}'>
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
                    <div class="formDirections__bottom_ph<?=$data_id?> js-search-other" style="display: none">
                        <div class="formDirections__bottom-blocks">
                            <?= $form
                                ->field($model, "direct[$data_id][other][]")
                                ->checkBoxList(ArrayHelper::map($items_dict['other'], 'id', 'name'),[
                                        'item' => function($index, $label, $name, $checked, $value) {
                                            $data_id = mb_substr( explode('[',$name)[2],0,-1);
                                            return "
                                            <div class='form-dropdown-stars__item'>
                                                <div class='cbx-block  cbx-block--16'>
                                                    <input type='checkbox' {$checked} name='{$name}' value='{$value}' class='cbx' id='333other{$data_id}_{$value}'>
                                                    <label class='label-cbx' for='333other{$data_id}_{$value}'>
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

                    <div class="formDirections__bottom_ph<?=$data_id?> js-search-country" style="display: none">
                        <div class="formDirections__bottom-blocks">
                            <div class="form-dropdown-stars__item">
                                <div class="cbx-block   cbx-block--16 ">
                                    <input name="Request[direct][<?=$data_id?>][palacetype][]" value="any" type="checkbox" class="cbx obj-palace palace-type-<?=$data_id?>" id="palace_type_<?=$data_id?>_0" checked="">
                                    <label class="label-cbx" for="palace_type_<?=$data_id?>_0">
                                        <span class="cbx-cnt">Любой тип</span>
                                    </label>
                                </div>
                            </div>
                            <?php foreach ($items_dict['palaceType'] as $type):?>
                                <div class="formDirections__cbx-ttl"><?=$type->name?></div>
                                    <div class=" formDirections__left-30 ">
                                        <?php foreach ($type->values as $value): ?>
                                            <div class="cbx-block   cbx-block--16 ">
                                                <input name="Request[direct][<?=$data_id?>][palacetype][]" value="<?=$value->id?>" type="checkbox" class="cbx obj-palace palace-type-<?=$data_id?>" id="palace_type_<?=$data_id?>_<?=$value->id?>">
                                                <label class="label-cbx" for="palace_type_<?=$data_id?>_<?=$value->id?>">
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
        <div class="formDirections__btn-orange submit-hotel-params" data-id="<?=$data_id?>">Применить</div>
    </div>
</div>