<?php
    $criteria = new CDbCriteria();
    $criteria->compare('isActive', '1');
    $criteria->compare('isRecommend', '1');
    $criteria->order = '`zIndex` ASC, `id` ASC';
    $recommedProducts = Product::model()->findAll($criteria);
    
    $l = $this->l;
?>

<?php if ( count($recommedProducts)!=0 ): ?>
    <div class="newProducts">
        <div class="container">
            <div class="legend_line2">
                <span><?= Yii::t('m', 'Мы рекомендуем') ?></span>
            </div>

            <div class="newProducts_inner">
                <?php foreach( $recommedProducts as $newsProduct ): ?>
                    <div class="newProduct">
                        <div class="npImage">
                            <table class="va ta">
                                <tr>
                                    <td>
                                        <?= CHtml::link($newsProduct->_previewIndex, array('product', 'id'=>$newsProduct->id)) ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="npOptions">
                            <?php if ( $newsProduct->_discount!==null ): ?>
                                <div class="discount"><?= $newsProduct->_discount ?></div>
                            <?php endif; ?>
                            <?php if ( $newsProduct->isBest ): ?>
                                <div class="best">best</div>
                            <?php endif; ?>
                        </div>
                        <div class="npTitle">
                            <?= $newsProduct->{name_.$l} ?>
                        </div>
                        <?= $newsProduct->_categoryIcon ?>
                        <div class="npFooter">
                            <div class="npPrice2">
                                <?= $newsProduct->_price ?>
                            </div>
                            <div class="npPrice1">
                                <?= $newsProduct->_priceH ?>
                            </div>
                            <div class="npRating rating" rating="<?= $newsProduct->ratingValue ?>" title="<?= Yii::t('m', 'Голосов:') ?> <?= $newsProduct->ratingCount ?>">
                                
                            </div>
                            <?= CHtml::link('<span>'.Yii::t('m', 'В корзину').'</span>', '#', array(
                                'class'=>'basketButton goBasket',
                                'data-id'=>$newsProduct->id,
                            )) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
<?php endif; ?>