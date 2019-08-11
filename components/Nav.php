<?php

namespace app\components;

use yii\bootstrap\Nav as BaseNav;
use yii\helpers\Html;

class Nav extends BaseNav
{
    public function init()
    {
        Html::addCssClass($this->options,[]);
    }
}