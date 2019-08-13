<?php
use LibUiTourFilter\widgets\WGuest;
?>

<?= $form->field($model, 'guest')->widget(WGuest::className(),[
    'name' => 'guest',

    // если нужно несколько одинаковых виджетов то это поле должно быть разным для них
    'templateId' => '_',

    // можно изменить классы контрола
    'cssClass' => 'tour-selection-field tour-selection-field--25p',

    // js объект с запросом, пример смотрим в lsfw.ui.main.request
    // можно сделать такой же объект, снять копию с родительского или использовать lsfw.ui.main.request
    'jsReqObject' => 'lsfw.ui.main.request',

    // объект формы, куда она будет создана
    'jsFormObject' => '_myPageFormGuest',

    ]);
?>
