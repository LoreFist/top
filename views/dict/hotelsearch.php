<?php foreach ($locationArr as $loc): ?>
    <?php if(isset($loc['error'])): ?>
        <div class="formDirections__bottom-item">
            <span>
                <?= $loc['error'] ?>
            </span>
        </div>
    <?php else:?>
        <div class="formDirections__bottom-item js-select-hotel-add"
             data-hotel-name="<?= $loc['name']?>" data-stars="<?= $loc['stars']?>"
             data-country="<?= $loc['country_name']?>" data-resort="<?= $loc['resort_name']?>"
        >
            <div class="formDirections__city">
                <div class=" lsfw-flag lsfw-flag--30w lsfw-flag-<?= $loc['country_id']?>">
                    <div class="hint"><?= $loc['country_name']?></div>
                </div>
                <span class="formDirections__cut"> <?= $loc['name']?> </span> <?= $loc['stars']?>
            </div>
            <span class="formDirections__count"><?= $loc['resort_name']?></span>
        </div>
    <?php endif; ?>
<?php endforeach; ?>