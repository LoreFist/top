<?php

use app\assets\AppAsset;
use lo\widgets\magnific\MagnificPopup;
use yii\helpers\Html;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon"
          href="<?php echo Yii::$app->request->baseUrl; ?>/i/favicon.png"
          type="image/x-icon"/>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="page">
    <?= $this->render('partial/header') ?>

    <?= $content ?>

    <div class="container">
        <?php echo $this->render('partial/agreement'); ?>
        <?php echo $this->render('partial/legal-information'); ?>
    </div>

    <?= $this->render('partial/footer') ?>

    <?php
    echo MagnificPopup::widget(
        [
            'target'  => '.legal-information-pp',
            'type'    => 'inline',
            'options' => [
                'modal' => 'true',
            ],
        ]
    )
    ?>
</div>
<?php AppAsset::register($this); ?>
<?php
$this->registerJsFile(
    '@web/js/jquery.sumoselect.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

