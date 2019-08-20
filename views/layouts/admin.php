<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/i/favicon.png" type="image/x-icon"/>

        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="page">
        <?=
        Breadcrumbs::widget([
            'homeLink' => [
                'label' => Yii::t('yii', 'Admin'),
                'url' => Yii::$app->homeUrl.'admin',
                'class'=>'breadcrumb-item'
            ],
            'links' => [
                    ['label'=> Yii::t('yii', 'Consultant'),'url' => Yii::$app->homeUrl.'admin/consultant','class'=>'breadcrumb-item']
            ],
        ])
        ?>
        <div class="page-main">
            <?= $content ?>
        </div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>