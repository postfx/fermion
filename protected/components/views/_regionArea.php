<?php if ( Yii::app()->db->createCommand()->select('COUNT(`id`)')->from('region')->queryScalar()>1 ): ?>

    <?php
        $regions = Yii::app()->db->createCommand()->select('id, name')->from('region')->order('zIndex ASC, id ASC')->queryAll();
    ?>
    <div id="regionArea">
        <div class="container">
            <div id="changeRegion">
                <?php foreach ( $regions as $region ): ?>
                    <?= BsHtml::link($region['name'], '#', array(
                        'region_id'=>$region['id'],
                    )) ?>
                    <span>|</span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php endif; ?>