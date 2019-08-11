<?php
use LibUiTourFilter\widgets\WPrice;
?>

<?= $form->field($model, 'price')->widget(WPrice::className(),[
    'name' => 'price',

    // если нужно несколько одинаковых виджетов то это поле должно быть разным для них
    'templateId' => '_',

    // можно изменить классы контрола
    'cssClass' => 'tour-selection-field tour-selection-field--25p',

    // js объект с запросом, пример смотрим в lsfw.ui.main.request
    // можно сделать такой же объект, снять копию с родительского или использовать lsfw.ui.main.request
    'jsReqObject' => 'lsfw.ui.main.request',

    // объект формы, куда она будет создана
    'jsFormObject' => '_myPageFormPrice',

    // переопределенеи дефолтных значений
    'priceFrom' => 0,
    'priceTo' => 1000000,
]); ?>