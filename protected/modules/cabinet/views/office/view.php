<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр административной единицы - "<?= CHtml::encode($model->name) ?>"</span>
        </div>
        <?php if ( $this->role->opt_office_update ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Место создано: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->date_create) ?>
            </div>
            <div class="product-card-publish">
                <?= ($model->isDeliveryPoint) ? 'Является пунктом выдачи' : '' ?>
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
                        <?= CHtml::encode($model->name) ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('country_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ( $model->country_id>0 ) ? $model->country->name : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('region_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ( $model->region_id>0 ) ? $model->region->name : '-' ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('city_id') ?>
                    </label>
                    <div class="item-value">
                        <?= ( $model->city_id>0 ) ? $model->city->name : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('street') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::encode($model->street) ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('house') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::encode($model->house) ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('office') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->office)>0 ) ? CHtml::encode($model->office) : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        График работы
                    </label>
                    <div class="item-value">
                        <?= $model->_workingHours ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('desc') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?=  ( strlen($model->desc)!=0 ) ? $model->desc : '-' ?>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>

