<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр темы вопроса №<?= $model->id ?></span>
        </div>
        <?php if ( 1 ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-center clearfix">
            <div class="product-card-col event-card-col">
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('id') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->id ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('text') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::encode($model->text) ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('zIndex') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->zIndex ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

