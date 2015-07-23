<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр слайда №<?= $model->id ?></span>
        </div>
        <?php if ( $this->role->opt_content ): ?>
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
                        <?= ( strlen($model->name)!=0 ) ? $model->name : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('text') ?>
                    </label>
                    <div class="item-value item-value-wide">
                        <?= ( strlen($model->text)!=0 ) ? $model->text : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('spec_link') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->spec_link)!=0 ) ? CHtml::link($model->spec_link, $model->spec_link, array(
                            'target'=>'_blank',
                        )) : '-' ?>
                    </div>
                </div>
                
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('spec_text') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->spec_text)!=0 ) ? $model->spec_text : '-' ?>
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
                        <?= $model->getAttributeLabel('link') ?>
                    </label>
                    <div class="item-value">
                        <?= ( strlen($model->link)!=0 ) ? CHtml::link($model->link, $model->link, array(
                            'target'=>'_blank'
                        )) : '-' ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

