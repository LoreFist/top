<?php

use yii\widgets\DetailView;

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