<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр запроса (обратная связь) №<?= $model->id ?></span>
        </div>
        <?php if ( 0 ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Запрос создан: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy, HH:mm', $model->date_create) ?>
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
                        <?= $model->getAttributeLabel('user_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ($model->user_id!==null) ? $model->_user : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('fio') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->fio ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('email') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::link($model->email, 'mailto:'.$model->email, array('target'=>'_blank')) ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('phone') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->phone)!=0 ) ? $model->phone : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('question_id') ?>
                    </label>
                    <div class="item-value">
                        <?= $model->question->text ?>
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

