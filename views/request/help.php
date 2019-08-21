<?php

use lo\widgets\magnific\MagnificPopup;

$this->title = 'Помощь в подборе';
?>
<div class="tour-selection-box">
    <div class="tabs-block">
        <div class="tabs-bar">
            <div id="step1" class="tab ">Подобрать тур</div>
            <div id="form" class="tab active">Нестандартный запрос</div>
            <div id="tabnostandard" class="line" style="overflow: hidden;left: 141.016px; width: 186.828px;"></div>
        </div>

        <?php echo $this->context->renderPartial('partial/extend', ['model' => $model, 'items_dict' => $items_dict]); ?>
        <?php echo $this->context->renderPartial('partial/nonstandard', ['model' => $model]); ?>
    </div>
</div>

<?php
echo MagnificPopup::widget(
    [
        'target'  => '.p-agreement-pp',
        'type'    => 'inline',
        'options' => [
            'modal' => 'true',
        ],
    ]
)
?>





