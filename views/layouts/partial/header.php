<?php

use app\components\Nav;
use yii\helpers\Html;

?>
<div class="headerMobile">

    <div class="headerMobile__flex js-serach-active-hide">
        <a href="#" class="headerMobile__logo">
            <img src="/i/th-logo.png" width="112" height="40" class="mr10">
        </a>
        <div class="headerMobile__right">
            <div class="headerMobile__right-noAuth" style="">
                1 507 753 участников
            </div>
        </div>
    </div>
    <div class="headerMobile__line">
        <div class="js-hide js-serach-active-hide">
            <div class="headerMobile__bth headerMobile__bth--auth mr10" style="display: none">
                <div class="headerMobile__key"></div>
            </div>
            <a href="#" class="headerMobile__user js-show-key-block">
                <?= Html::img("/i/user-ava-cat.jpg") ?>
            </a>
            <div class="headerMobile__bth mr5">
                <div class="headerMobile__burger"></div>
            </div>

            <div class="headerMobile__bth js-show-search">
                <i class="fas fa-search"></i>
            </div>
        </div>
        <div class="headerMobile__right js-hide js-serach-active-hide">
            <div class="header-lang">
                <div class="header-lang__block">
                    <span class="header-lang__cnt">Rus</span>
                    <i class="fa fa-chevron-down header-lang__arr" aria-hidden="true"></i>
                </div>
                <div class="header-lang__dropdown">
                    <div class="header-lang__lang js-ru" style="display: none;">Rus</div>
                    <div class="header-lang__lang js-eng">Eng</div>
                </div>
            </div>
        </div>
        <div class="headerMobile__cross"></div>
    </div>

</div>

<header class="header">
    <div class="header-cnt header-cnt_index ">
        <a href="#" class="header-logo">
            <?= Html::img("/i/th-logo.png") ?>
        </a>
        <div class="header-nav">
            <div class="header-nav-cont">
                <?php
                $menuItems = [
                    [
                        'label'       => 'Мой профиль',
                        'url'         => '#',
                        'options'     =>  ['class' => 'header-nav-item'],
                        'linkOptions' => ['class' => 'header-nav-link grey'],
                    ],
                    [
                        'label'       => 'Отели',
                        'url'         => '#',
                        'options'     =>  ['class' => 'header-nav-item'],
                        'linkOptions' => ['class' => 'header-nav-link grey'],
                    ],
                    [
                        'label'       => 'Клуб ТопХотелс',
                        'url'         => '#',
                        'options'     =>  ['class' => 'header-nav-item'],
                        'linkOptions' => ['class' => 'header-nav-link grey'],
                    ],
                    [
                        'label'       => 'Помощь в подборе',
                        'url'         => '#',
                        'options'     => ['class' => 'header-nav-item active'],
                        'linkOptions' => ['class' => 'header-nav-link'],
                    ],
                    [
                        'label'       => 'Добавить отзыв',
                        'url'         => '#',
                        'options'     => ['class' => 'header-nav-item'],
                        'linkOptions' => ['class' => 'header-nav-link grey'],
                    ],
                ];

                echo Nav::widget(
                    [
                        'activateItems' => true,
                        'items'         => $menuItems,
                        'options'       => ['class' => 'header-nav-list hide-1023'],
                    ]
                );
                ?>
            </div>
        </div>

        <div class="exit__block">
            <div class="header__exit">Выйти</div>
        </div>
    </div>

    <div class="header-bot header-bot-suggest-big">
        <div class="header-bot-cnt auth ">
            <div class="header__news">
                <button class="header-bot__filter-icon">
                    <i class="fas fa-thumbs-up grey" style=""></i>
                </button>
                <div class="header__news-center">
                    <input class="header__inp js-open-bs"
                           placeholder="Введите отель, город или страну"
                           autocomplete="off"
                    >
                </div>
            </div>
        </div>

        <a href="#"
           class="header-bot__key js-show-auth auth-pp"></a>

        <div class="header-lang">
            <div class="lang-block js-lang-open">
                <span class="lang-block__cnt">Rus</span>
                <i class="fa fa-chevron-down lang__arr"
                   aria-hidden="true"></i>
            </div>
            <div class="lang-block__dropdown">
                <div class="lang-block__lang js-lang-change">Eng</div>
            </div>
        </div>
    </div>
</header>