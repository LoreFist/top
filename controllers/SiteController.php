<?php
namespace app\controllers;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends \yii\web\Controller {

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
