<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/atom.css',
        'css/tables.css',
        'css/site.css',
        'css/_lsfw/atom.css',
        'css/_lsfw/flags.css',
        'css/_lsfw/fonts.css',
        'css/_lsfw/lswf-icons.css',
        'css/_lsfw/reset-ls.css',
        'css/_lsfw/tabs.css',
        'css/lib-ui-tour-filter/flags.css',
        'css/lib-ui-tour-filter/lsfw-adults-widget.css',
        'css/lib-ui-tour-filter/lsfw-date-widget.css',
        'css/lib-ui-tour-filter/lsfw-durability-widget.css',
        'css/lib-ui-tour-filter/lsfw-form-direction.css',
        'css/lib-ui-tour-filter/lsfw-price-widget.css',
        'css/lib-ui-tour-filter/lsfw-tour-filter.css',
        'css/tophotels_site_html/agree-pp.css',
        'css/tophotels_site_html/main-cnt.css',
        'css/tophotels_site_html/tabs-bar-mobile.css',
        'css/tophotels_site_html/layouts/footer.css',
        'css/tophotels_site_html/layouts/header.css',
        'css/tophotels_site_html/layouts/header-mobile.css',
        'css/tophotels_site_html/layouts/left-menu.css',
        'css/tophotels_site_html/layouts/left-menu-mobile.css',
        'css/vendor/magnific-popup.css',
        'css/tophotels_site_html/main.css',
    ];

    public $js = [
        '/js/jquery-3.4.1.min.js',
        '/js/layouts.js',
    ];

    public $depends = [
        'rmrevin\yii\fontawesome\NpmFreeAssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public $publishOptions = [
        'forceCopy' => true
    ];
}
