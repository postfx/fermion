<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр категории новостей - "<?= CHtml::encode($model->name) ?>"</span>
        </div>
        <?php if ( $this->role->opt_newsCategory_update ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Категория создана: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->date_create) ?>
            </div>
            <div class="product-card-publish">
                <?= $model->_active ?>
            </div>
        </div>
        
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
                        <?= $model->getAttributeLabel('zIndex') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->zIndex ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('name') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::encode($model->name) ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('desc') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= $model->desc ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

