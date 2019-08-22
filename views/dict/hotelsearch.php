<?php if (count($location) == 0): ?>
    <div class="formDirections__bottom-item">
        <span>
            По указанному названию совпадений не найдено
        </span>
    </div>
<?php else: ?>

    <?php foreach ($location as $lc): ?>
        <div class="formDirections__bottom-item js-select-hotel-add"
             data-hotel-name="<?= $lc->name ?>" data-stars="<?= $lc->dictcat->name ?>"
             data-country="<?= $lc->dictresort->dictcountry->name ?>" data-resort="<?= $lc->dictresort->name ?>"
             data-id-location="<?= $lc->id ?>"
        >
            <div class="formDirections__city">
                <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-<?= $lc->dictresort->dictcountry->id ?>">
                    <div class="hint"><?= $lc->dictresort->dictcountry->name ?></div>
                </div>
                <span class="formDirections__cut"> <?= $lc->name ?> </span> <?= $lc->dictcat->name ?>
            </div>
            <span class="formDirections__count"><?= $lc->dictresort->name ?></span>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
