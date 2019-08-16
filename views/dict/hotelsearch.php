<?php if(count($location) == 0): ?>
    <div class="formDirections__bottom-item">
        <span>
            По указанному названию совпадений не найдено
        </span>
    </div>
<?php else:?>

<?php foreach ($location as $lc): ?>
        <div class="formDirections__bottom-item js-select-hotel-add"
             data-hotel-name="<?= $lc->name ?>" data-stars="<?= $lc->cat0->name ?>"
             data-country="<?= $lc->resort0->country0->name ?>" data-resort="<?= $lc->resort0->name ?>"
             data-id-location="<?= $lc->id ?>"
        >
            <div class="formDirections__city">
                <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-<?= $lc->resort0->country0->id ?>">
                    <div class="hint"><?= $lc->resort0->country0->name ?></div>
                </div>
                <span class="formDirections__cut"> <?= $lc->name ?> </span> <?= $lc->cat0->name ?>
            </div>
            <span class="formDirections__count"><?= $lc->resort0->name ?></span>
        </div>
<?php endforeach; ?>
<?php endif; ?>
