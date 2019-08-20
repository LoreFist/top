<?php

use yii\grid\GridView;
use app\assets\AdminAsset;

AdminAsset::register($this);
$this->title = 'Admin bootstrap';

?>
<div class="container-fluid">
    <div class="row">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => $columns,
            'summary' => '',
        ]); ?>
    </div>
</div>
