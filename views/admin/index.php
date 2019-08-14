<?php

use yii\grid\GridView;
use app\assets\AdminAsset;

AdminAsset::register($this);
$this->title = 'Admin bootstrap';
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'summary' => '',
]); ?>