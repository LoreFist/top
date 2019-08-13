<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Admin asset bundle.
 */
class AdminAsset extends AssetBundle
{

    public $css = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css'
    ];
    public $js = [
        'https://code.jquery.com/jquery-3.3.1.js',
        'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
        'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js'
    ];
    public $depends = [
    ];

}