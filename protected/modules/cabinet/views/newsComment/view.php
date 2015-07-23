<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр комментария №<?= $model->id ?></span>
        </div>
        <?php if ( $this->role->opt_content ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Комментарий создан: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy, HH:mm', $model->date_create) ?>
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
                        <?= $model->getAttributeLabel('news_id') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::link($model->news->title, array('/cabinet/news/view', 'id'=>$model->news_id)) ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('user_id') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::link($model->user->login, array('/cabinet/user/view', 'id'=>$model->user_id)) ?>
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
            </div>
        </div>

    </div>
</div>

