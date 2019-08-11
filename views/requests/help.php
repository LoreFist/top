<?php
use lo\widgets\magnific\MagnificPopup;
?>
<div class="tour-selection-box">
    <div class="tabs-block">
        <div class="tabs-bar">
            <div id="step1" class="tab active">Подобрать тур</div>
            <div id="form" class="tab ">Нестандартный запрос</div>
            <div id="tabnostandard" class="line" style="overflow: hidden;left: 141.016px; width: 186.828px;"></div>
        </div>

        <?php echo $this->context->renderPartial('partial/extend', ['model'=>$model]); ?>
        <?php echo $this->context->renderPartial('partial/nonstandard', ['model'=>$model]); ?>
    </div>
</div>

<?php
echo MagnificPopup::widget(
    [
        'target' => '.p-agreement-pp',
        'type'=>'inline',
        'options' => [
            'modal'=> 'true',
        ],
    ]
)
?>





