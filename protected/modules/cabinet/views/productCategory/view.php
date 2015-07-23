<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр категории товаров - "<?= CHtml::encode($model->name) ?>"</span>
        </div>
        <?php if ( $this->role->opt_productCategory_update ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Категория создана: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy, HH:mm', $model->date_create) ?>
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
                        <?= $model->getAttributeLabel('name') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->name ?>
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
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('text') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= $model->text ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('img') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= $model->_img ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('video') ?>
                    </label>
                    <div class="item-value">
                        <?php if ( strlen($model->video)!=0 ): ?>
                            <iframe width="540" height="400" src="<?= $model->video ?>" frameborder="0" allowfullscreen></iframe>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

