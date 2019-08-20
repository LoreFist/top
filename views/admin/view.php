<?php

use app\assets\AdminAsset;
use yii\widgets\DetailView;

AdminAsset::register($this);
$this->title = 'Admin bootstrap | view';


echo DetailView::widget(
    [
        'model'      => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            'email',
            'direct',
            'optional',
            'created_at:datetime',
        ],
    ]
);
?>