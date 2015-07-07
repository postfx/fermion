<?php
    $criteria = new CDbCriteria();
    $criteria->compare('isActive', '1');
    $criteria->compare('isSlider', '1');
    $criteria->order = '`zIndex` ASC, `id` ASC';
    $sliderProducts = Product::model()->findAll($criteria);
    
    $l = $this->l;
?>

<?php if ( count($sliderProducts)!=0 ): ?>
    <div class="pre_productSlider">
        <ul id="productSlider">
            <?php foreach ( $sliderProducts as $p ): ?>
                <li>
                    <?= CHtml::link($p->_previewIndex, array('site/product', 'id'=>$p->id)) ?>
                    <div class="slider_info">
                        <?= CHtml::link(CHtml::encode($p->{name_.$l}), array('site/product', 'id'=>$p->id), array(
                            'class'=>'slider_info_title',
                        )) ?>
                        <div class="slider_info_price"><?= $p->_price ?></div>
                        <div class="slider_info_desc">
                            <?= (strlen($p->{desc_.$l})>128)?(mb_substr($p->{desc_.$l}, 0, 128).'...'):$p->{desc_.$l} ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>