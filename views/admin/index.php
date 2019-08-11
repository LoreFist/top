<?php

use yii\grid\GridView;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'summary' => '',
]); ?>