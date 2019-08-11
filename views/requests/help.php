<?php
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/help-selection.js',['depends' => [\yii\web\JqueryAsset::className()]]);

use lo\widgets\magnific\MagnificPopup;
?>


<div class="tour-selection-box">
    <div class="tabs-block">
        <div class="tabs-bar">
            <div id="form" class="tab active">Нестандартный запрос</div>
            <div id="tabnostandard" class="line" style="overflow: hidden;left: 0px; width: 195.656px;"></div>
        </div>

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





