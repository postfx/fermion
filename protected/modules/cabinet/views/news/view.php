<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-card-ico"></i> <span>Просмотр новости - "<?= CHtml::encode($model->title) ?>"</span>
        </div>
        <?php if ( $this->role->opt_news_update ): ?>
            <?= CHtml::link('редактировать', array('update', 'id'=>$model->id), array(
                'class'=>'edit-link',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        
        <div class="product-card-top">
            <div class="product-card-create">
                Новость создана: <?= Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->date_create) ?>
                <br />
                Новость обновлена: <?= (strlen($model->date_update)!=0)?Yii::app()->dateFormatter->format('dd.MM.yyyy, HH:mm', $model->date_update):'-' ?>
            </div>
            <div class="product-card-publish">
                <?= $model->_active ?>
                <br />
                Отображать в популярных: <?= $model->_show_index ?>
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
                        <?= $model->_user ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('category_id') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::link($model->category->name, array('/cabinet/newsCategory/view', 'id'=>$model->category_id)) ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        Период действия новости
                    </label>
                    <div class="item-value">
                        <?= $model->_period ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('title') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::encode($model->title) ?>
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
                        <?= $model->getAttributeLabel('countComments') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::encode($model->countComments) ?>
                    </div>
                </div>
                <div class="product-card-item">
                    <label>
                        <?= $model->getAttributeLabel('countViews') ?>
                    </label>
                    <div class="item-value">
                        <?= CHtml::encode($model->countViews) ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

